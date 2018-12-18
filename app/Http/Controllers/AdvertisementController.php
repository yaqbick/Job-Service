<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Trade;
use App\Employer;
use App\Comment;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    //wyświetlanie strony głównej

    public function index()
    {
        $advertisements = Advertisement::paginate(4);
        $trades = Trade::all()->toArray();
        return view('advertisements.welcome', compact('advertisements','trades'));
    }

    //wyswietlanie formularza do tworzenia ogłoszenia

    public function create()
    {
        $trades = Trade::all()->toArray();
        $employers = Employer::all()->toArray();
        return view('advertisements.create', compact('employers', 'trades'));
    }

    //tworzenie ogłoszenia. Poza danymi zczytywanymi z formularza, metoda uzupełnia tabelę 
    // "advertisements" o id użytkownika($userId) oraz obraz wybranej firmy($img)

    public function store(Request $request)
    {
        $userId = Auth::id();

        $ads = $this->validate(request(), [
            'tytul' => 'required',
            'miasto' => 'required',
            'firma'=>'required',
            'branza' => 'required',
            'tresc_ogloszenia' => 'required',
          ]);

          $ads = [ 
            'title'=> $request['tytul'], 
            'city'=> $request['miasto'], 
            'employer'=> $request['firma'], 
            'trade'=> $request['branza'], 
            'content'=> $request['tresc_ogloszenia'] 
                    
       ];

          $ads['userId'] = $userId;
          $img = DB:: table('employers')->where('name',$ads['employer'])->value('image');
          $ads['image'] = $img;
          Advertisement::create($ads);

          return redirect('/')->with('success', 'Ogłoszenie zostało dodane');
    }

    public function show($id)
    {
        //
    }

    //edycja ogłoszenia

    public function edit($id)
    {
        $trades = Trade::all()->toArray();
        $employers = Employer::all()->toArray();
        $adv = Advertisement::find($id);
        return view('advertisements.edit',compact('adv','id','trades','employers'));
    }

    //update ogłoszenia w bazie danych

    public function update(Request $request, $id)
    {
        $ads = Advertisement::find($id);
        $ads = $this->validate(request(), [
            'tytul' => 'required',
            'miasto' => 'required',
            'firma'=>'required',
            'branza' => 'required',
            'tresc_ogloszenia' => 'required',
          ]);
        
          DB::table('advertisements')->where('id', $id)->update(['title' =>  $request->get('tytul')]);
          DB::table('advertisements')->where('id', $id)->update(['city' =>  $request->get('miasto')]);
          DB::table('advertisements')->where('id', $id)->update(['employer' =>  $request->get('firma')]);
          DB::table('advertisements')->where('id', $id)->update(['trade' =>  $request->get('branza')]);
          DB::table('advertisements')->where('id', $id)->update(['content' =>  $request->get('tresc_ogloszenia')]);
          $img = DB:: table('employers')->where('name',$ads['firma'])->value('image');
          DB::table('advertisements')->where('id', $id)->update(['image' =>  $img]);
        
          return redirect('/')->with('success', 'Ogłoszenie zostało zmienione');
    }

    //usuwanie danego ogłoszenia

    public function destroy($id)
    {
        $adv = Advertisement::find($id);
        $adv->delete();
        return redirect()->back();
    }

    //wyświetlanie podglądu ogłoszenia. Metoda sprawdza, czy zostało założone filtrowanie
    // i w zależnośći od tego określa, które ogłoszenie jest następne przy naciskaniu strzałek.
    //Metdoa wyświetla również komentarze przypisane do danego ogłoszenia.

    public function example(Request $request)
    {
        $url= URL::current();
        $id = substr($url,-1);
        $maxId = DB::table('advertisements')->max('id');
        $con = DB::table('advertisements')->where('id', $id)->value('content');
        $title = DB::table('advertisements')->where('id', $id)->value('title');
        $empl = DB::table('advertisements')->where('id', $id)->value('employer');
        $city = DB::table('advertisements')->where('id', $id)->value('city');
        if(strpos($con, '</p>')==true)
        {
            $encode=htmlentities($con);
            $decode= html_entity_decode($encode);
            $con=$decode;
        }
        $userId = Auth::id();
        $request->session()->put('id', $id);
        $comments= Comment::all()->where('exampleId',$id)->toArray();
        $filtered=url()->previous();

        if(strpos($filtered,'filter')==true)
        { 
        $advId = $request->session()->get('filter');
        $index =array_search($id, $advId);
        
            if($index+1>=sizeof($advId))
            {
                $nextId=$advId[$index];
            }
            else
            {
                $nextId= $advId[$index+1];
            }

            if($index-1<0)
            {
                $prevId=$advId[$index];
            }
            else
            {
                $prevId= $advId[$index-1];
            }
        return view('filtered.example', compact('con','trades','comments','prevId','nextId','format','title','empl','city'));
        }
        else
        {
            if($id>1)
            {
                $prevId=$id-1;
            }
            else
            {
                $prevId=1;
            }

            if($id==$maxId)
            {
                $nextId=$maxId;
            }
            else
            {
                $nextId=$id+1;
            }
        
        return view('advertisements.example', compact('con','trades','comments','prevId','nextId','format','title','empl','city'));
        }
        
    }

    //filtrowanie ogłoszeń. W zależności od danych zczytanych z inputów i checkboxów do $request,
    //tworzone jest jedno złożone zapytanie do bazy danych. Id filtrowanych ogłoszeń zostają umieszczone
    // w tablicy $advId i zostają wysłane do sesji z kluczem "filter". Dzięki temu metoda "example" 
    //może rozpoznać, że został nałożony filtr, a przewijanie strzałkami odbywa się tylko w obrębie 
    // id ogłoszeń umieszczonych w $advId. Następnie zostaje wyświetlony wynik zapytania.
    

    public function filter(Request $request)
    {
        $advertisements=array();
        $trades = Trade::all()->toArray();
        $data=$request->except('_token');
        unset($data['city']);
        unset($data['job']);
        $query= "select * from advertisements where ";
        $city = $request->input('city');
        $job = $request->input('job');
   
        if(!empty($city))   
        {   
          $query=$query."city = '$city' AND ";   
        }
   
        if(!empty($job))  
        {   
          $query=$query."title LIKE  '%$job%' AND ";   
        }
        foreach($data as $id => $value)
        {
                $query = $query." trade = '$id' OR ";
        }
        if(empty($id) && empty($city) && empty($job))
        {
            return redirect()->action('AdvertisementController@index');
        }
        $query=substr($query,0,-4);
        $advertisements = DB::select($query);;
        $advId=array();
        foreach ($advertisements as $adv)     
        {      
           array_push($advId, $adv->id);      
        }    
        $request->session()->put('filter', $advId);

        return view('advertisements.filtered', compact('advertisements','trades'));
    }

    //wyświetla listę ogłoszeń uzytkownika

    public function list()
    {
        $userId = Auth::id();
        $yourAdv = Advertisement::all()->where('userId',$userId)->toArray();

        return view('advertisements.list', compact('yourAdv'));
    }
}
