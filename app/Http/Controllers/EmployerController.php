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

        $emp = $this->validate(request(), [
            'emplName' => 'required',
            'emplDescription' => 'required',
          ]);

          $emp = [
              'name'=> $request['emplName'],
              'description'=> $request['emplDescription'],
              'image'=>'default'
              
          ];
          
          Employer::create($emp);
          $currentEmpl = DB::table('employers')->where('description', $emp['description'])->first();
 
          return redirect('/employers/pics/'.$currentEmpl->id);
      
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

    public function gallery()
    {
        $images = Image::all();
        $rowsCount= sizeOf($images)/2;
        //dd($images[1]->url);
        //dd($rowsCount);
        return view('employers.pics', compact('images','rowsCount'));
    }

    public function chooseImg(Request $request)
    {
        $prevUrl=url()->previous();
        $emplId = str_replace("http://127.0.0.1:8000/employers/pics/",null,$prevUrl);
        //$imgId=$request->input('image')->get('value');
        dd($request);
        DB::table('employers')->where('id', $emplId)->update(['image' => 1]);

      return back();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
       // return redirect('/employers/create/imageId={imageId}');
     
    }
}
