@extends('layouts.app')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >


@section('content')
    
<style>
  .btn{
    float: right;
  }

  .card-header{
    text-align-last: center;
  }
</style>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header" data-toggle="tooltip" title="Click to open User List">
              <a class="btn btn-danger" style="float:right"  href="{{route('landing')}}">BACK</a>
              
              <a class="collapsed card-link text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <h5>User Results: Total: {{ $preReadinessResults->count() }}</h5>
                
              </a>
            </div>
              <div class="card-body">

              
                    
                <div class="row">
                  <div class="col-md-6">
              
                    <div class="card">
                      <h5 class="card-header"  style="background-color:#90EE90;">
                        Pre Readiness
                      </h5>
                    </div>
                    <div class="card-scroll">
                                    @forelse ($preReadinessResults as $result)
    
                    
                      
                        <div class="card">
                            <h5 class="card-header" style="background-color:#90EE90;">
                            
                              <span class="float-right">
                                Completed: {{ $result->created_at->toFormattedDateString() }}
                              </span>
                            </h5>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                Mood: {{ $result->mood }}
                              </li>
                              <li class="list-group-item">
                                Sleep: {{ $result->sleep }}
                              </li>
                              <li class="list-group-item">
                                Hydration: {{ $result->hydration }}
                              </li>
                              <li class="list-group-item">
                                Soreness: {{ $result->soreness }}
                              </li> 
                              <li class="list-group-item">
                                Fatigue: {{ $result->fatigue }}
                              </li> 
                              <li class="list-group-item">
                                Willingness: {{ $result->willingness }}
                              </li>
                              <li class="list-group-item">
                                Comment: {{ $result->comment }}
                              </li>
                            </ul>
                       
                      </div>
                    @empty
                      <p>You have no results</p>
                    @endforelse

                    </div>
                  </div>
                   
                    <div class="col-md-6">
                      <div class="card">
                        <h5 class="card-header" style="background-color:#E9967A;">
                          Post Wellness
                        </h5>
                      </div>

                      <div class="card-scroll">
                @forelse ($postWellnessResults as $item)

                
                  
                    <div class="card">
                        <h5 class="card-header" style="background-color:#E9967A;">

                          <span class="float-right">
                            Completed: {{ $item ->created_at->toFormattedDateString() }}
                          </span>
                        </h5>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                            Intensity: {{ $item ->intensity }}
                          </li>
                          <li class="list-group-item">
                            RPE: {{ $item ->rpe }}
                          </li>
                          <li class="list-group-item">
                            Satisfaction: {{ $item ->hydration }}
                          </li>
                          <li class="list-group-item">
                            Soreness: {{ $item ->soreness }}
                          </li> 
                          <li class="list-group-item">
                            Fatigue: {{ $item ->fatigue }}
                          </li> 
                          <li class="list-group-item">
                            Difficulty: {{ $item ->difficulty }}
                          </li>
                          <li class="list-group-item">
                            Comment: {{ $item ->comment }}
                          </li>
                        </ul>
                    
                  </div>
                @empty
                  <p>You have no results</p>
                @endforelse
                </div>
                </div>
                </div>
              </div>
          </div>
    </div>
    </div>
  
  
    @endsection