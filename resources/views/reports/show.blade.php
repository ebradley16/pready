@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h2>{{$report->title}}</h2>
                    <a class="btn btn-danger" style="float:right" href="{{route('reports.index')}}">BACK</a>
                </div>
            <h4>{{$report->score}}</h4>
                <div class="card-body">
                   {{$report->report}}
                        </div>
                   {{$report->teams}}     
                        <hr>

                    <small>Written on {{$report->created_at}}</small>
                    
<hr>
<a href="/reports/{{$report->id}}/edit" class="btn btn-primary">Edit</a>

{!!Form::open(['action' => ['ReportsController@destroy', $report->id], 'method' => 'POST', 'class' => 'pull-right'])!!}

{{Form::hidden('_method', 'DELETE')}}

{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

{!!Form::close()!!}
@endsection