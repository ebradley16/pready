@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h2>{{$goal->goal}}</h2>
                    <a class="btn btn-danger" style="float:right" href="{{route('goals.index')}}">BACK</a>
                </div>
                <div class="card-body">

<p>{{$goal->timeframe}}</p>
<p>{{$goal->behaviour1}}</p>
<p>{{$goal->behaviour2}}</p>
<p>{{$goal->behaviour3}}</p>
<p>{{$goal->achieved}}</p>




{{-- <a href="/goals/{{$goal->id}}/edit" class="btn btn-secondary">Edit</a> --}}
                   
                        </div>

                        <hr>

                    <small>Written on {{$goal->created_at}}</small>
                    <a href="/goals/{{$goal->id}}/edit" class="btn btn-secondary">Edit</a>
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    
<hr>
{{-- <a href="/goals/{{$goal->id}}/edit" class="btn btn-secondary">Edit</a> --}}

{!!Form::open(['action' => ['GoalsController@destroy', $goal->id], 'method' => 'POST', 'class' => 'pull-right'])!!}

{{Form::hidden('_method', 'DELETE')}}

{{-- {{Form::submit('Delete', ['class' => 'btn btn-danger'])}} --}}

{!!Form::close()!!}
@endsection