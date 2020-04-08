@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Report</h2>
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
                {!! Form::open(['action'=> ['ReportsController@update', $report->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', $report->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('score', 'Score')}}
                        {{Form::text('score', $report->score, ['class' => 'form-control', 'placeholder' => 'Score'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('report', 'Report')}}
                        {{Form::textArea('report', $report->report, ['class' => 'form-control', 'placeholder' => 'Report Text'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('teams', 'Teams')}}
                        {{Form::textArea('teams', $report->teams, ['class' => 'form-control', 'placeholder' => 'Teams'])}}
                    </div>

                {{Form::hidden('_method', 'PUT')}}
                   {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

                {!! Form::close() !!}

                    
    </div>

  
@endsection