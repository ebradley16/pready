@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create Goal</h2>
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
                {!! Form::open(['action'=>'GoalsController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('goal', 'Goal')}}
                        {{Form::text('goal', '', ['class' => 'form-control', 'placeholder' => 'Goal'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('timeframe', 'Time Frame')}}
                        {{Form::text('timeframe', '', ['class' => 'form-control', 'placeholder' => 'Time Frame'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('behaviour1', 'Behaviour 1')}}
                        {{Form::text('behaviour1', '', ['class' => 'form-control', 'placeholder' => 'Behaviour 1'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('behaviour2', 'Behaviour 2')}}
                        {{Form::text('behaviour2', '', ['class' => 'form-control', 'placeholder' => 'Behaviour 2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('behaviour3', 'Behaviour 3')}}
                        {{Form::text('behaviour3', '', ['class' => 'form-control', 'placeholder' => 'Behaviour 3'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('achieved', 'Achieved')}}
                        {{Form::hidden('achieved', 0)}}
                        {{ Form::checkbox('achieved') }}
                    </div>
                   {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

                {!! Form::close() !!}

                    
    </div>

  
@endsection