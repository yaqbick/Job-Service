
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
        <!-- <div class="row justify-content-center">

                <div class="col-sm-2">
                    <input type="text" name='job' class="form-control" placeholder="stanowisko">
                </div>
                <div class="col-sm-2">
                    <input type="text" name='city' class="form-control" placeholder="miasto">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-info">szukaj</button>
                </div>

        </div> -->

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
                <div id="trade" class="col-12 col-md-3 pt-5">                  
                    {{csrf_field()}}
                    <ul>
                    <p><b>Branża</b></p>
                    @foreach($trades as $trd)
                    <li class="form-check">
                        <input class="form-check-input" name ="{{$trd['name']}}" type="checkbox" value="{{$trd['name']}}" id="{{$trd['name']}}" >
                        <label class="form-check-label" for="{{$trd['name']}}">
                        <p>{{$trd['name']}}</p>
                        </label>
                    </li>
                    @endforeach
                    
                    <button type="submit" class="btn btn-info">szukaj</button>
                    </ul>
    </form>
                </div>
                <div class = "col-12 col-md-9">
                    <div class="table pt-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Najnowsze oferty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($advertisements as $ads)
                                <tr class="offer">
                                    <td><img src="{{$ads['image']}}" width="100" height="100" alt="Image"/></td>
                                    <td class="adv">
                                    <h5 class="offer-details__title-link"><a href="advertisements/example/{{$ads['id']}}">{{$ads['title']}}</a></h5>
                                    <p class="offer-company">{{$ads['employer']}}</p>
                                    <ul class="offer-labels">
                                        <li class="offer-labels__item offer-labels__item--location offer-labels__item--expand-trigger">
                                                <i class="mdi mdi-map-marker offer-labels__item-icon"></i>{{$ads['city']}}

                                            </li>
                                            <li class="offer-labels__item offer-labels__item--employment-level">
                                                <i class="mdi mdi-signal offer-labels__item-icon"></i>Specjalista
                                            </li>
                                            <li class="offer-labels__item offer-labels__item--employment-form">
                                                <i class="mdi mdi-calendar-blank offer-labels__item-icon"></i>Pełen etat
                                            </li>
                                    </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-sm-center">
                            <div class="col-2"></div>
                            <div class="form-group col-6 paginator"></div>
                            {{ $advertisements->links() }}
                            <div class="col-2"></div>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

