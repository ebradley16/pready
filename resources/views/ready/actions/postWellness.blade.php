@extends('layouts.app')

@section('content')


<style>
    .btn {
        float: right;
    }
    </style>



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Post Session Wellness</h2>
                    <a class="btn btn-danger" style="float:right" href="{{route('landing')}}">BACK</a>
                    </div>

                    <div class="card-body">
    <h1>Post Session Wellness</h1>
    <p>Please take a few minutes to fill out this wellness questionnaire</p> 

   
   
    <form action="createWellness" method="POST">
        @csrf
        <label for="customRange1">Intensity</label>
        <input type="range" class="custom-range" name="intensity" id="customRange1" min="1" max="10" value="5">
        <br> 
        <label for="customRange2">RPE(Rate of Preceived Excertion)</label>
        <input type="range" class="custom-range" name="rpe" id="customRange2" min="1" max="10" value="5">
        <br>    
        <label for="customRange3">Satisfaction</label>
        <input type="range" class="custom-range" name="satisfaction" id="customRange3" min="1" max="10" value="5">
        <br>
        <label for="customRange4">Soreness</label>
        <input type="range" class="custom-range" name="soreness" id="customRange4" min="1" max="10" value="5">
        <br>
        <label for="customRange5">Fatigue</label>
        <input type="range" class="custom-range" name="fatigue" id="customRange5" min="1" max="10" value="5">
        <br>
        <label for="customRange6">Difficulty</label>
        <input type="range" class="custom-range" name="difficulty" id="customRange6" min="1" max="10" value="5">
        <br>
        <label for="textArea">Comment</label>
        <input type="textarea" class="text-area" name="comment" id="textArea1">
        <br><br>
        <button type="submit">SUBMIT</button>
    </form>

                </div>
            </div>
        </div>
    </div>
  

    @endsection 