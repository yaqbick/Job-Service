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
                <tr>
                    <td><h3>{{$ads['title']}}</h3><h5>{{$ads['employer']}}</h5><h5>{{$ads['city']}}</h5></td>
                    <td><a href="{{action('AdvertisementController@edit', $ads['id'])}}" class="btn btn-warning">Edytuj</a></td>
                    <td>          
                        <form action="{{action('AdvertisementController@destroy', $ads['id'])}}" method="post">
                        {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Usuń</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection