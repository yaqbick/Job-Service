<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use App\Image;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('employers.create');
    }

    public function store(Request $request)
    {      
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    //funkcja teoretycznie mogłaby nazywać się po prostu "store". 
    //funkcja nie tworzy jednak nowego rekordu w bazie danych,
    //a jedynie tymczasowo przechowuje w sesji nazwę i opis nowej firmy.
    // Stąd decyzja o zrobieniu oddzielnej metody tempStore.

    public function tempStore(Request $request) 
    { 

     $emp = $this->validate(request(), [ 
         'nazwa_firmy' => 'required|unique:employers,name', 
         'opis_firmy' => 'required', 
      ]); 

      $emp = [ 
           'name'=> $request['nazwa_firmy'], 
           'description'=> $request['opis_firmy'] 
                   
      ]; 
        
        $request->session()->put('key', $emp);

        return redirect('/employers/pics/1');
  
}

    // funkcja, która ładuje galerię obrazów do wyboru przy określaniu avatara nowej firmy. 

    public function gallery()
    {
        $images = Image::all();
        $imageCount = DB::table('images')->max('id');
        $rowsCount= sizeOf($images)/8;
        $rowsCount = floor( $rowsCount);
        $modulo=sizeOf($images)%8;

        return view('employers.pics', compact('images','rowsCount', 'imageCount','modulo'));
    }

    // funkcja, która sprawia, że kliknięcie na obraz tworzy nowy rekord w bazie danych

    public function chooseImg(Request $request)
    {
        $value = $request->session()->get('key');
        $url=url()->current();
        $emplId = str_replace("http://159.65.232.239/employers/choose/imageId=",null,$url);
        $img = DB::table('images')->where('id', $emplId)->value('url');
        $newEmp = [
            'name'=> $value['name'],
            'description'=> $value['description'],
            'image'=>$img
            
        ];
        Employer::create($newEmp);
        $request->session()->forget('key');

       return redirect('/');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
     
    }
}
