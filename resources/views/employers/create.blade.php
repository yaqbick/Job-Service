
@extends('layouts.app')

@section('content')
<div class ="container pt-5">

@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif

  <form method="post" action="{{action('EmployerController@tempStore')}}" enctype="multipart/form-data">
    {{csrf_field()}}
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <input type="text" class="form-control" name="nazwa_firmy" placeholder="nazwa"  value="{{ old('nazwa_firmy') }}">
        </div>
      </div>>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <textarea class="form-control content" id="exampleFormControlTextarea2" name="opis_firmy" rows="10" >{{ old('opis_firmy') }}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <button type="submit" class="btn btn-inf" style="margin-left:38px">Dalej</button>
        </div>
      </div>
  </form>
</div>
@endsection