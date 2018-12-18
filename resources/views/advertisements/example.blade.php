@extends('layouts.app')

@section('content')

<div class= "container">
<div  class="row justify-content-sm-center pt-5">
    <div class=" col-2  align-self-center">
        <a href="/advertisements/example/{{$prevId}}"><img class="arrow" src="https://icons8.com/iconizer/files/DefaultIcon_ver_0.11/orig/arrow-left.png" ></a>
    </div>
    <div  class="col-6 textarea ">
    <p></p>
        <pre class="advHeader">{!!$empl!!}   {!!$title!!}    {!!$city!!}</pre>
        <p class="advContent">{!!$con!!}</p>
    </div>
    <div class="col-2  align-self-center">
        <a href="/advertisements/example/{{$nextId}}"><img class="arrow" src="https://icons8.com/iconizer/files/DefaultIcon_ver_0.11/orig/arrow-right.png"></a>
    </div>
</div>

<div  class="row arrowDown justify-content-sm-center pt-5">
    <div class=" col-4  "></div>
    <div class="form-group col-6">
    <a href="/advertisements/example/{{$prevId}}"><button class="btn btn-info arrowSmall" ><-</button>
    <a href="/advertisements/example/{{$nextId}}"><button class="btn btn-danger arrowSmall">-></button>
    </div>
    </div>
    <div class="col-4 "></div>       
</div>





<div class="row pt-5">
    <div class="col-md-3"></div>
        <div class="table col-md-6">
            <table class="table table-striped">
                @foreach($comments as $comm)
                <tr>
                    <td><p><b>{{$comm['userName']}}</b> napisał:</p></td>
                    <td>{{$comm['comment']}}</td>
                    @guest
                    @else
                    @if($comm['userId']==Auth::id())
                    <td>
                   
                    <form action="{{action('CommentController@destroy', $comm['id'])}}" method="post">
                    {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Usuń</button>
                    </form>
                    </td>
                    @else
                    @endif
                    @endguest
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@guest

@else
<div class="komentarze pt-5">
    <form method="post" action="{{url('comments')}}">
    {{csrf_field()}}
    <div class="row justify-content-sm-center">
        <div class="col-2"></div>
          <div class="form-group col-6">
            <input type="text" class="form-control" name="comment" placeholder="dodaj komentarz..."><button type="submit" class="btn btn-info">dodaj</button>
          </div>
          <div class="col-2"></div>
        </div>
      </div>
    </form>
</div>
</div>
@endguest
@endsection