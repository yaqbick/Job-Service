
@extends('layouts.app')

@section('content')
<div class ="container pt-5">
  <form method="post" action="{{url('employers')}}" enctype="multipart/form-data">
    {{csrf_field()}}
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <input type="text" class="form-control" name="emplName" placeholder="nazwa">
        </div>
      </div>>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <textarea class="form-control content" id="exampleFormControlTextarea2" name="emplDescription" rows="10">Opis firmy</textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <input  type="file" name="emplImage" id="exampleFormControlTextarea2"  rows="10">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <button type="submit" class="btn btn-inf" style="margin-left:38px">Dodaj</button>
        </div>
      </div>
  </form>
</div>
@endsection