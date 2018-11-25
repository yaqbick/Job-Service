<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use App\Image;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employers.create');
    }


    public function store(Request $request)
    {      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
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

    public function gallery()
    {
        $images = Image::all();
        $imageCount = DB::table('images')->max('id');
        $rowsCount= sizeOf($images)/8;
        $rowsCount = floor( $rowsCount);
        $modulo=sizeOf($images)%8;

        //dd($images[1]->url);
        //dd($rowsCount);
        return view('employers.pics', compact('images','rowsCount', 'imageCount','modulo'));
    }

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
