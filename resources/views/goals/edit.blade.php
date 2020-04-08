@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Goal</h2>
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
                {!! Form::open(['action'=> ['GoalsController@update', $goal->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('goal', 'Goal')}}
                        {{Form::text('goal', $goal->goal, ['class' => 'form-control', 'placeholder' => 'Goal'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('timeframe', 'Time Frame')}}
                        {{Form::text('timeframe', $goal->timeframe, ['class' => 'form-control', 'placeholder' => 'Timeframe'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('behaviour1', 'Behaviour 1')}}
                        {{Form::text('behaviour1', $goal->behaviour1, ['class' => 'form-control', 'placeholder' => 'Behaviour 1'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('behaviour2', 'Behaviour 2')}}
                        {{Form::text('behaviour2', $goal->behaviour2, ['class' => 'form-control', 'placeholder' => 'Behaviour 2'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('behaviour3', 'Behaviour 3')}}
                        {{Form::text('behaviour3', $goal->behaviour3, ['class' => 'form-control', 'placeholder' => 'Behaviour 3'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('achieved', 'Achieved')}}
                        {!! Form::checkbox('achieved', $goal->achieved); !!}
                    </div>

                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

                    {!! Form::close() !!}

                    
    </div>

  
@endsection