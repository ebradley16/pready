@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Article</h2>
                    <a class="btn btn-danger" style="float:right" href="{{route('landing')}}">BACK</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


<br>

    <div class="card">
    
           
                <div class="card-body">
                {!! Form::open(['action'=> ['ArticlesController@update', $article->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('body', 'Body')}}
                        {{Form::textArea('body', $article->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
                    </div>

                {{Form::hidden('_method', 'PUT')}}
                   {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

                {!! Form::close() !!}

                    
    </div>

  
@endsection