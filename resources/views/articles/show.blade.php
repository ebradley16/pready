@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h2>{{$article->title}}</h2>
                    <a class="btn btn-danger" style="float:right" href="{{route('articles.index')}}">BACK</a>
                </div>
                <div class="card-body">
                   {{$article->body}}
                        </div>

                        <hr>

                    <small>Written on {{$article->created_at}}</small>
                    
<hr>
<a href="/articles/{{$article->id}}/edit" class="btn btn-primary">Edit</a>

{!!Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'POST', 'class' => 'pull-right'])!!}

{{Form::hidden('_method', 'DELETE')}}

{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

{!!Form::close()!!}
@endsection