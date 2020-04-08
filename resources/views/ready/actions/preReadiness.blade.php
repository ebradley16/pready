@extends('layouts.app')

<style>
    .btn {
        float: right;
    }
    </style>

@section('content')
    

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Perform Ready User Dashboard</h2>
                <a class="btn btn-danger" href="{{route('landing')}}">BACK</a>
                </div>

                    <div class="card-body">
                        <h1>Pre Session Readiness</h1>
        
                        <p>Please take a few minutes to fill out this wellness questionnaire</p> 

    
                        <form action="createReadiness" method="POST">
                        @csrf
                        <label for="customRange">Mood</label>
                        <input type="range" style="background-color:brown" class="custom-range mood" name="mood" id="customRange1" min="1" max="10" value="5">
                        <br>
                        <label for="customRange">Sleep</label>
                        <input type="range" class="custom-range" name="sleep" id="customRange2" min="1" max="10" value="5">
                        <br>    
                        <label for="customRange">Hydration</label>
                        <input type="range" class="custom-range" name="hydration" id="customRange3" min="1" max="10" value="5">
                        <br>
                        <label for="customRange">Soreness</label>
                        <input type="range" class="custom-range" name="soreness" id="customRange4" min="1" max="10" value="5">
                        <br>
                        <label for="customRange">Fatigue</label>
                        <input type="range" class="custom-range" name="fatigue" id="customRange5" min="1" max="10" value="5">
                        <br>
                        <label for="customRange">Willingness</label>
                        <input type="range" class="custom-range" name="willingness" id="customRange6" min="1" max="10" value="5">
                        <br>
                        <label for="textArea">Comment</label>
                        <input type="textarea" class="text-area" name="comment" id="textArea1" placeholder="">
                        <br><br>
                        <button type="submit">SUBMIT</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
  
  
    @endsection