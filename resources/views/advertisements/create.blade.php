
@extends('layouts.app')

@section('content')
<div class ="container pt-5">
  <form method="post" action="{{url('advertisements')}}" enctype="multipart/form-data">
    {{csrf_field()}}
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <input type="text" class="form-control" name="title" placeholder="tytuł">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="text" class="form-control" name="city" placeholder="miasto">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <select class="custom-select" name="employer">
          <option>wybierz firmę</option>
          @foreach($employers as $empl)
          <option>{{$empl['name']}}</option>
          @endforeach
          </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <select class="custom-select" name="trade">
          <option>wybierz branżę</option>
          @foreach($trades as $trd)
          <option>{{$trd['name']}}</option>
          @endforeach
          </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
        <textarea class="form-control content"  name="content" placeholeder='dodaj ogłoszenie' rows="10"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <button type="submit" class="btn btn-inf" style="margin-left:38px">Dodaj Ogłoszenie</button>
        </div>
      </div>
  </form>
</div>
@endsection