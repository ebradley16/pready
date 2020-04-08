@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Perform Ready User Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>You are logged in as  {{ Auth::user()->name }}!</h3>
<br>


<a href="{{ route('preReadiness' )}}">
    <button type="button" class="btn btn-primary btn-block">
        Pre-Session Readiness
    </button>
</a>
<br>

<a href="{{ route('postWellness' )}}">
    <button type="button" class="btn btn-primary btn-block" >
        Post Session Wellness
    </button>
</a>
<br>

<a href="{{ route('appointment' )}}">
    <button type="button" class="btn btn-primary btn-block" >
        Appointments
    </button>
</a>


<br>

<a href="/honkydoryreadiness/{{Auth::user()->id}}" class="btn btn-primary btn-block" style="float:right"hp>
    
    My Readiness History

</a>

   



<br>

<a href="{{ route('tactics' )}}">
    <button type="button" class="btn btn-primary btn-block" >
       Tactics
    </button>
</a>

<br>

<a href="{{ route('goals.index' )}}">
    <button type="button" class="btn btn-primary btn-block" >
       Goals
    </button>
</a>

<br>
<a href="{{ route('reports.index' )}}">
    <button type="button" class="btn btn-primary btn-block" >
       Match Reports
    </button>
</a>

<br>


<a href="{{ route('articles.index' )}}">
    <button type="button" class="btn btn-primary btn-block" >
       Articles
    </button>
</a>






  
@endsection