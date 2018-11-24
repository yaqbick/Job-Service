@extends('layouts.app')

@section('content')



<div class="row justify-content-md-center pt-5">
<div class=" col-md-1 align-self-center mr-5">
    <a href="/filtered/example/{{$prevId}}"><img src="https://iconizer.net/files/Brightmix/orig/monotone_arrow_left_small.png"></a>
    </div>
    <!-- <div class="card col-md-3" style="width: 50rem; height: 800px;">{!!$con!!}</div>
    <div class="card col-md-1" style="width: 50rem; height: 800px;">{!!$con!!}</div> -->
    <div class="card col-md-6 .ml-auto" style="width: 50rem; height: 800px;">
        <p></p>
        <pre class="advHeader">{!!$empl!!}   {!!$title!!}    {!!$city!!}</pre>
        <p>{!!$con!!}</p>
    </div>
    <div class=" col-md-1 align-self-center mr-5 ">
        <a href="/filtered/example/{{$nextId}}"><img src="http://icons-for-free.com/icon/download-arrow_keyboard_right_icon-463560.png"></a>
    </div>
</div>

<div class="row justify-content-md-center pt-5">
    <button type="submit" class="btn btn-inf"><a href="/filtered/example/{{$prevId}}">Poprzednie ogłoszenie</a></button>
    <button type="submit" class="btn btn-inf"><a href="/filtered/example/{{$nextId}}">Następne ogłoszenie</a></button>
</div>
<div class="row pt-5">
    <div class="col-md-4"></div>
        <div class="table col-md-4">
            <table class="table table-striped">
            @foreach($comments as $comm)
                <tr>
                    <td><p>użytkownik {{$comm['userName']}} napisał:</p></td>
                    <td>{{$comm['comment']}}</td>
                    @guest
                    @else
                    @if($comm['userId']==Auth::id())
                    <td>
                    <form action="{{action('CommentController@destroy', $comm['id'])}}" method="post">
                    {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
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
    <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="text" class="form-control" name="comment" placeholder="dodaj komentarz..."><button type="submit" class="btn btn-info">dodaj</button>
          </div>
        </div>
      </div>
    </form>
</div>
@endguest
@endsection