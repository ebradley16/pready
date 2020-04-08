@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hi {{ Auth::user()->name }}, you are logged in as an admin user!
                </div>
                <a href="{{ route('admin.users.index' )}}">
                    <button type="button" class="btn btn-primary btn-block" >
                        User Management
                    </button>
                </a>
                <br>    
                <a href="{{ route('articles.create' )}}">
                    <button type="button" class="btn btn-primary btn-block" >
                        Create Article
                    </button>
                </a>
                <br>
                <a href="{{ route('history')}}">
                    <button type="button" class="btn btn-primary btn-block" >
                        View Readiness History
                    </button>
                </a>
                <br>
                {{-- <a href="{{ route('tactics.index' )}}">
                    <button type="button" class="btn btn-primary btn-block" >
                        Team Tactics
                    </button>
                </a> --}}
                <br>
            </div>
        </div>
    </div>
</div>
@endsection