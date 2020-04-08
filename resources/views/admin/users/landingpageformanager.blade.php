@extends('layouts.app')

@section('content')
</div>
<canvas id="myChart"></canvas>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Perform Ready Manager Dashboard: {{ Auth::user()->name }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




<br>


</div>
<a href="{{ route('team' )}}">
    <button type="button" class="btn btn-primary btn-block" >
        Team Management
    </button>
</a>
<br>    
<a href="{{ route('articles.create' )}}">
    <button type="button" class="btn btn-primary btn-block" >
        Create Article
    </button>
</a>
<br>
<a href="{{ route('reports.create' )}}">
    <button type="button" class="btn btn-primary btn-block" >
        Create Match Report
    </button>
</a>
<br>
<a href="{{ route('historyOfTeam')}}">
    <button type="button" class="btn btn-primary btn-block" >
        View Overall Team Readiness
    </button>
</a>
<br>

<a href="{{ route('historyOfPlayer')}}">
    <button type="button" class="btn btn-primary btn-block" >
        View Player Readiness
    </button>
</a>
<br>
<a href="{{ route('playerGoals')}}">
    <button type="button" class="btn btn-primary btn-block" >
        View Player Goals
    </button>
</a>



  
@endsection
