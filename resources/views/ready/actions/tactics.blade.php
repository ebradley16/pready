@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Tactics Area</h2>
                <a class="btn btn-danger" style="float:right" href="{{route('landing')}}">BACK</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4" style="background-color:#aaa;">
                            <h5>Attacking Principles</h5>
                          <p>Some text..</p>
                        </div>
                        <div class="col-md-4" style="background-color:#bbb;">
                            <h5>Defensive Principles</h5>
                          <p>Some text..</p>
                        </div>
                      </div>















  
@endsection