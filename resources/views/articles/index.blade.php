@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Articles</h2>
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
    
        @if(count($articles) > 0)
            @foreach ($articles as $article)
           
                <div class="card-body">
                     <h4 class="card-title">{{$article->title}}</h4>

                     <small>Updated at: {{$article->created_at}}</small>
                        {{-- <p class="card-text">{{$article->body}}</p> --}}
                <a href="/articles/{{$article->id}}" class="btn btn-primary" style="float:right"hp>Read</a>
                </div>
            @endforeach
            {{-- {{$articles->links()}} --}}
         @else 
        <p>No post found.</p>
         @endif
    </div>
    {{$articles->links()}}
  
@endsection