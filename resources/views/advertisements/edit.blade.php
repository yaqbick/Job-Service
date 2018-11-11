
@extends('layouts.app')

@section('content')
<div class ="container pt-5">
  <form method="post" action="{{action('AdvertisementController@update', $id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <input type="text" class="form-control" name="title" value="{{$adv->title}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="text" class="form-control" name="city" value="{{$adv->city}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <select class="custom-select" name="employer">
          <option selected>{{$adv->employer}}</option>
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
          <option selected>{{$adv->trade}}</option>
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
        <textarea class="form-control content"  name="content"  rows="10">{{$adv->content}}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <button type="submit" class="btn btn-inf" style="margin-left:38px">Zapisz</button>
        </div>
      </div>
  </form>
</div>
@endsection