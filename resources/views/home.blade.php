@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row justify-content-md-center pt-5">
                            <p class="text-white"> Zalogowałeś się!</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
