@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Insert Report</h2>
                    <a class="btn btn-danger" style="float:right" href="{{route('manager')}}">BACK</a>
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
                {!! Form::open(['action'=>'ReportsController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('score', 'Score')}}
                        {{Form::textArea('score', '', ['class' => 'form-control', 'placeholder' => 'Score'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('report', 'Report')}}
                        {{Form::textArea('report', '', ['class' => 'form-control', 'placeholder' => 'Report Text'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('teams', 'Teams')}}
                        {{Form::textArea('teams', '', ['class' => 'form-control', 'placeholder' => 'Teams'])}}
                    </div>
                   {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

                {!! Form::close() !!}

                    
    </div>

  
@endsection