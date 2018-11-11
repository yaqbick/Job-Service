<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'emplImage' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);

          $path = $request->file('emplImage')->store('public');
          $path = substr($path,7);

          $emp = [
              'name'=> $request['emplName'],
              'description'=> $request['emplDescription'],
              'image'=>$path
          ];
          
          Employer::create($emp);
  
          return back()->with('success', 'Pracodawca został dodany');
      
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
}
