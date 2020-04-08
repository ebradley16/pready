@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Match Reports</h2>
                    <a class="btn btn-danger" style="float:right" href="{{route('landing')}}">BACK</a>

                    @if (Gate::allows('management-users'))
                    <a class="btn btn-default" href="{{ route('reports.create') }}">
                    Create Match Report
                    </a>
                @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


<br>

    <div class="card">
    
        @if(count($reports) > 0)
            @foreach ($reports as $report)
           
                <div class="card-body">
                     <h4 class="card-title">{{$report->title}}</h4>
                     <h6>{{$report->score}}</h6>

                     <small>Updated at: {{$report->created_at}}</small>
                        {{-- <p class="card-text">{{$article->body}}</p> --}}
                <a href="/reports/{{$report->id}}" class="btn btn-primary" style="float:right"hp>Read</a>
                </div>
            @endforeach
           
         @else 
        <p>No reports found.</p>
         @endif
    </div>
    {{$reports->links()}}
  
@endsection