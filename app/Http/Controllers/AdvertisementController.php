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
    public function index()
    {
        $advertisements = Advertisement::paginate(2);
        $trades = Trade::all()->toArray();
        return view('advertisements.welcome', compact('advertisements','trades'));
    }

    public function create()
    {
        $trades = Trade::all()->toArray();
        $employers = Employer::all()->toArray();
        return view('advertisements.create',compact('trades','employers'));
    }

    public function store(Request $request)
    {
        $userId = Auth::id();

        $ads = $this->validate(request(), [
            'title' => 'required',
            'city' => 'required',
            'employer'=>'required',
            'trade' => 'required',
            'content' => 'required',
          ]);

          $ads['userId'] = $userId;

          Advertisement::create($ads);
  
          return back()->with('success', 'Ogłoszenie zostało dodane');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $trades = Trade::all()->toArray();
        $employers = Employer::all()->toArray();
        $adv = Advertisement::find($id);
        return view('advertisements.edit',compact('adv','id','trades','employers'));
    }


    public function update(Request $request, $id)
    {
        $ads = Advertisement::find($id);
        $ads = $this->validate(request(), [
            'title' => 'required',
            'city' => 'required',
            'employer'=>'required',
            'trade' => 'required',
            'content' => 'required',
          ]);
        
          DB::table('advertisements')->where('id', $id)->update(['trade' =>  $request->get('trade')]);
          DB::table('advertisements')->where('id', $id)->update(['city' =>  $request->get('city')]);
          DB::table('advertisements')->where('id', $id)->update(['employer' =>  $request->get('employer')]);
          DB::table('advertisements')->where('id', $id)->update(['trade' =>  $request->get('trade')]);
          DB::table('advertisements')->where('id', $id)->update(['content' =>  $request->get('content')]);
        // $ads['title'] = $request->get('title');
        // $ads['city'] = $request->get('city');
        // $ads['employer'] = $request->get('employer');
        // $ads['trade'] = $request->get('trade');
        // $ads['content'] = $request->get('content');
        // $ads->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $adv = Advertisement::find($id);
        $adv->delete();
        return redirect()->back();
    }
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

    public function list()
    {
        $userId = Auth::id();
        $yourAdv = Advertisement::all()->where('userId',$userId)->toArray();

        return view('advertisements.list', compact('yourAdv'));
    }
}
