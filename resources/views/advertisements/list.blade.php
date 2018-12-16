@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center">
    <div class = "col-12 col-md-9">
        <div class="table pt-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Tytuł</th>
                </tr>
                </thead>
                <tbody>
                @foreach($yourAdv as $ads)
                <tr class="offer">
                    <td><img src="{{$ads['image']}}" width="100" height="100" alt="Image"/></td>
                    <td class="adv">
                        <h5 class="offer-details__title-link"><a href="/advertisements/example/{{$ads['id']}}">{{$ads['title']}}</a></h5>
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

                        <td class="offer-options">
                            <ul class="offer-labels">
                                <li class="offer-labels__item"><a href="http://159.65.232.239/advertisements/2/edit" class="mdi mdi-wrench offer-labels__item-icon">Edytuj</a></li>   
                                <li class="offer-labels__item">
                                    <form action="{{action('AdvertisementController@destroy', $ads['id'])}}" method="post">
                                    {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="mdi mdi-bookmark-remove offer-labels__item-icon" type="submit">Usuń</button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection