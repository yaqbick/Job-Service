<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="image-picker/image-picker.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="data:text/css;charset=utf-8," rel="stylesheet" data-href="../dist/css/bootstrap-theme.min.css" id="bs-theme-stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=q5zd6y22pfmjen97jr4rfv1s5genmdycoc9t6j30tanjga6z"></script>
    <script>tinymce.init({ selector:'textarea.content' });</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <title>Bumeluj.pl</title>
        <style>
        .logo
        {
            display:none;
        }
        .offer
        {
            display: block;
            position: relative;
            margin-bottom: .625rem;
            box-shadow: 0 1px 4px 0 rgba(0,0,0,.2);
        }
        .offer-labels 
        {
            list-style: none;
            padding: 0;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            margin-bottom: .3125rem;
            margin-top: .5rem;
        }

        .offer-labels__item 
        {
            color: #9a9a9a;
            padding-right: 1.4375rem;
            line-height: 1.75rem;
            font-size: .875rem;
            font-weight: 400;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .offer-details__title-link 
        {
            overflow: hidden;
            color: #1b75bc;
            font-weight: 600;
            background-color: transparent;
            border: none;
            padding: 0;
            cursor: pointer;
            text-align: left;
        }

        .offer-options
        {
            overflow: hidden;
            color: #9a9a9a;
            text-decoration: none;
            font-weight: 600;
            background-color: transparent;
            display: block;
            position: relative;
            margin-bottom: .625rem;
        }

        .offer-company 
        {
            font-size: .875rem;
            font-weight: 400;
            margin-bottom: 0;
            pointer-events: none;
            cursor: default;
            display: block;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5rem;
            max-height: 3rem;
        }

    .mdi::before
    {
    font-size: 24px;
    line-height: 14px;
    }

    .btn .mdi::before 
    {
    position: relative;
    top: 4px;
    }

    .btn-xs .mdi::before
    {
        font-size: 18px;
        top: 3px;
    }

    .btn-sm .mdi::before 
    {
        font-size: 18px;
        top: 3px;
    }

    .dropdown-menu .mdi 
    {
        width: 18px;
    }

    .dropdown-menu .mdi::before 
    {
        position: relative;
        top: 4px;
        left: -8px;
    }

    .nav .mdi::before 
    {
        position: relative;
        top: 4px;
    }

    .navbar .navbar-toggle .mdi::before 
    {
        position: relative;
        top: 4px;
        color: #FFF;
    }
    .breadcrumb .mdi::before 
    {
        position: relative;
        top: 4px;
    }

    .breadcrumb a:hover 
    {
        text-decoration: none;
    }

    .breadcrumb a:hover span 
    {
        text-decoration: underline;
    }

    .alert .mdi::before 
    {
        position: relative;
        top: 4px;
        margin-right: 2px;
    }

    .input-group-addon .mdi::before 
    {
        position: relative;
        top: 3px;
    }

    .navbar-brand .mdi::before 
    {
        position: relative;
        top: 2px;
        margin-right: 2px;
    }

    .list-group-item .mdi::before 
    {
        position: relative;
        top: 3px;
        left: -3px
    }
    .example
    {   position: relative;
        height: 800px;
        width: 250px;
        border: 1px;

    }

    .textarea
    {  
        width: 500px;
        height: 800px;
        display: block;
        max-width: 100%;
        background-color: white;
    }


    .advHeader{
        border-style: solid;
        background-color: lightgrey;
        text-align:  center;
        position:relative;
        padding-top: 20px;
        border-color:  #008B8B;
        background-color: #008B8B;
        color: white;
        display: inline-block;
        }

    .arrow
    {
        width: 100px;
        height: 100px:
    }
    .arrowDown{
        display:none;
    }
    

    #trade{ width:20%; position:static float:left; overflow:hidden; color:white;}

    @media only screen and (max-width: 900px) {
    #bumelujbutton{
        display:none;
    }
    .offer-labels__item--employment-form{
        display:none;
    }
    .offer-labels__item--employment-level
    {
        display:none;
    }
    .advcontent
    {
        font-size:6px;
    }

    .advHeader{
        display:block;
    }

    .arrow{
        display:none;
    }

    .arrowDown{
        display:flex;
    }

    .arrowSmall
    {
        width: 50px;
        height: 50px;
        margin-left:15px;
    }


    #trade{display: none; width:88%; position:relative;  height:30px;color: white;}

    .textarea
    {
        width:350px;
        
    }

    .comment
    {
        width:200px;
    }

    .example{   position: relative;
                width: 10px;
                margin-left: 30px;
                height: 500px;

            
    }
    
    }

    @media only screen and (max-width: 300px) { 

    .logo{
        display:flex;
    }
    }



    


    .adv a:link, .adv a:visited{
        color: #008B8B;
        text-decoration: none;
        display: inline-block;

    }
    .paginator a:link, .paginator a:visited {
        background-color: #008B8B;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
    .active{
        background-color: #4169E1;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;    
    }


    .paginator a:hover, .paginator a:active {
        background-color: #4169E1;
    }


    body
    {
            background-image: url("https://lh3.googleusercontent.com/-_gvlOXyqZDY/W8y1Gw1xx2I/AAAAAAAACE0/8HC9nylw9TQWNqdbxx2GUbhm-iU3q62SgCL0BGAYYCw/h900/2018-10-21.jpg");
            background-attachment: fixed;
    }
    
    </style>
</head>
<body>
    <div id="app">
        <main class="hh">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li id="bumelujbutton" class="nav-item">
                            <a class="btn btn-info" href="/advertisements">bumeluj.pl</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/advertisements">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/advertisements/create">Dodaj Ogłoszenie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/employers/create">Dodaj Firmę</a>
                        </li>
                        @guest
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/advertisements/list/<?php  echo Auth::id();?>">Twoje Ogłoszenia</a>
                        </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontakt</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Zaloguj</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Zarejestruj się</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>               
                </div>
                <div class="logo">
                    <a class="btn btn-info" href="/advertisements">bumeluj.pl</a>
                </div>
        </nav>

        @yield('content')
        </main>
    </div>

</body>
</html>
