@extends('layouts.app')

<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 300;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 30px;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: .2rem;
        text-decoration: none;
    
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h1>Welcome to Perform Ready</h1>
<h2>Take your game to another level</h2>


        </div>
        
    </div>
    
</div> --}}



<div class="content">
    <div class="title m-b-md">
        Perform Ready
    </div>
<h2>Take your game to another level.</h2>
<br>
<br>
<br>

    <div class="links">
        <a class="btn btn-info" href="{{ route('login') }}"> {{ __('Login') }} </a>
       
        <a class="btn btn-info" href="{{ route('register') }}">{{ __('Register') }}</a>
        
        <a class="btn btn-info" href="{{ route('articles.index' )}}"> {{__('Articles')}} </a> 
        
        
       
        <a class="btn btn-info" href="https://github.com/laravel/laravel">GitHub</a>
    </div>
</div>




@endsection 








    