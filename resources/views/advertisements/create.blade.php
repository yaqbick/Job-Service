
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

  <form method="post" action="{{url('advertisements')}}" enctype="multipart/form-data">
    {{csrf_field()}}
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <input type="text" class="form-control" name="tytul" placeholder="tytuł"  value="{{ old('tytul') }}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="text" class="form-control" name="miasto" placeholder="miasto"  value="{{ old('miasto') }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <select class="custom-select" name="firma">
          <option disabled selected>wybierz firme</option>
          @foreach($employers as $empl)
          <option @if (old('firma') == $empl['name']) selected="selected" @endif>{{$empl['name']}}</option>
          @endforeach
          </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <select class="custom-select" name="branza">
          <option disabled selected>wybierz branżę</option>
          @foreach($trades as $trd)
          <option @if (old('branza') == $trd['name']) selected="selected" @endif>{{$trd['name']}}</option>
          @endforeach
          </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
        <textarea class="form-control content"  name="tresc_ogloszenia" placeholeder='dodaj ogłoszenie' rows="10" > {{ old('tres_ogloszenia') }}</textarea>
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