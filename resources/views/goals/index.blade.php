@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Goals</h2>
                    
                    <a class="btn btn-danger" style="float:right" href="{{route('landing')}}">BACK</a>
                   
                    <a class="btn btn-success" style="float:left" href="{{route('goals.create')}}">Create Goal</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


<br>

    <div class="card">
    
        @if(count($goals) > 0)
            @foreach ($goals as $goal)
           
                <div class="card-body">
                     <h4 class="card-title">{{$goal->goal}}</h4>

                     <small>Updated at: {{$goal->created_at}}</small>
                        {{-- <p class="card-text">{{$article->body}}</p> --}}
                <a href="/goals/{{$goal->id}}" class="btn btn-success" style="float:right"hp>View</a>
                </div>
            @endforeach
            {{-- {{$goals->links()}} --}}
         @else 
        <p>No goal found.</p>
         @endif
    </div>

  
@endsection