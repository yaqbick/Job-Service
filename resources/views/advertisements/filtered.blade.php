
@extends('layouts.app')

@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif


    <form method="post" action="{{url('advertisements/filter')}}"> 
        <div class="row justify-content-md-center">
            <div class="form-row ">
                <div class="col col-md-4 offset-2 ">
                    <input type="text" name='job' class="form-control" placeholder="stanowisko">
                </div>
                <div class="col col-md-4">
                    <input type="text" name='city' class="form-control" placeholder="miasto">
                </div>
                <div class="col col-md-2">
                    <button type="submit" class="btn btn-info">szukaj</button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-3 col-xl-2 bd-sidebar  pt-5">
                    <p class="text-white"><b>Branża</b></p>
                    {{csrf_field()}}
                    @foreach($trades as $trd)
                    <div class="form-check">
                        <input class="form-check-input" name ="{{$trd['name']}}" type="checkbox" value="{{$trd['name']}}" id="{{$trd['name']}}" >
                        <label class="form-check-label" for="{{$trd['name']}}">
                        <p class="text-white">{{$trd['name']}}</p>
                        </label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-info">szukaj</button>
    </form>
                </div>
                <div class = "col-12 col-md-9">
                    <div class="table pt-5">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Tytuł</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($advertisements as $adv)
                            <tr>

                                <td><img src="{{$adv->image}}" width="100" height="100" alt="Image"/></td>
                                    <td class="adv"><h3><a href="/filtered/example/<?php  echo $adv->id;?>"><?php  echo $adv->title;?></h3></a><h5><?php  echo $adv->employer;?></h5><h5><?php  echo $adv->city;?><h5></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

