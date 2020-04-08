@extends('layouts.app')


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
              <a class="btn btn-danger" style="float:right"  href="{{route('manager')}}">BACK</a>
              
              <a class="collapsed card-link text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <h5>User Results: Total: {{ $preReadinessResults->count() }}</h5>
                
              </a>
            </div>
              <div class="card-body">
                @forelse ($team as $player)
                  <div>
                    {{ $player->name }}
                    <a href="/reports/{{$player->id}}" class="btn btn-primary" style="float:right"hp>View</a>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card">
                        <h5 class="card-header"  style="background-color:#90EE90;">
                          Pre Readiness
                        </h5>
                      </div>
                      @php
                      $i = 0
                      @endphp

                      @forelse ($preReadinessResults as $preReadinessItem)
                        @if ( $preReadinessItem->user_id == $player->id)
                        @php
                        $i = 1
                        @endphp
                          <div class="card">
                            <h5 class="card-header" style="background-color:#90EE90;">
                                <span class="float-left">
                                <a href="/ready/actions{{$preReadinessItem->id}}" class="btn btn-success" style="float:right"hp>View</a>
                                </span>
                              <span class="float-right">
                                Completed: {{ $preReadinessItem->created_at->toFormattedDateString() }}
                              </span>
                            </h5>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                Mood: {{ $preReadinessItem->mood }}
                              </li>
                              <li class="list-group-item">
                                Sleep: {{ $preReadinessItem->sleep }}
                              </li>
                              <li class="list-group-item">
                                Hydration: {{ $preReadinessItem->hydration }}
                              </li>
                              <li class="list-group-item">
                                Soreness: {{ $preReadinessItem->soreness }}
                              </li> 
                              <li class="list-group-item">
                                Fatigue: {{ $preReadinessItem->fatigue }}
                              </li> 
                              <li class="list-group-item">
                                Willingness: {{ $preReadinessItem->willingness }}
                              </li>
                              <li class="list-group-item">
                                Comment: {{ $preReadinessItem->comment }}
                              </li>
                            </ul>
                          </div>
                        @endif
                       @empty
                      @endforelse

                      @if ($i==0)
                      <p>Player has no results</p>
                      @endif


                    </div>
                    <div class="col-md-6">
                      <div class="card">
                        <h5 class="card-header" style="background-color:#E9967A;">
                          Post Wellness
                        </h5>
                      </div>
                      @php
                      $i = 0
                      @endphp
                      @forelse ($postWellnessCollection as $postWellnessItem)
                        @if ( $postWellnessItem->user_id == $player->id)
                        @php
                        $i = 1
                        @endphp
                          <div class="card">
                            <h5 class="card-header" style="background-color:#E9967A;">

                              <span class="float-right">
                                Completed: {{ $postWellnessItem ->created_at->toFormattedDateString() }}
                              </span>
                            </h5>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                Intensity: {{ $postWellnessItem ->intensity }}
                              </li>
                              <li class="list-group-item">
                                RPE: {{ $postWellnessItem ->rpe }}
                              </li>
                              <li class="list-group-item">
                                Satisfaction: {{ $postWellnessItem ->hydration }}
                              </li>
                              <li class="list-group-item">
                                Soreness: {{ $postWellnessItem ->soreness }}
                              </li> 
                              <li class="list-group-item">
                                Fatigue: {{ $postWellnessItem ->fatigue }}
                              </li> 
                              <li class="list-group-item">
                                Difficulty: {{ $postWellnessItem ->difficulty }}
                              </li>
                              <li class="list-group-item">
                                Comment: {{ $postWellnessItem ->comment }}
                              </li>
                            </ul>
                      
                          </div>
                    @endif
                  @empty
                    <p>You have no results</p>
                  @endforelse

                  @if ($i==0)
                  <p>Player has no results</p>
                  @endif

                    </div>
                  </div>
{{-- 
                  <div class="row">


                    <div class="col-md-6">

                          @forelse ($postWellnessResults as $postWellnessItem)
                        
                            
                              <div class="card">
                                  <h5 class="card-header" style="background-color:#E9967A;">

                                    <span class="float-right">
                                      Completed: {{ $postWellnessItem ->created_at->toFormattedDateString() }}
                                    </span>
                                  </h5>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                      Intensity: {{ $postWellnessItem ->intensity }}
                                    </li>
                                    <li class="list-group-item">
                                      RPE: {{ $postWellnessItem ->rpe }}
                                    </li>
                                    <li class="list-group-item">
                                      Satisfaction: {{ $postWellnessItem ->hydration }}
                                    </li>
                                    <li class="list-group-item">
                                      Soreness: {{ $postWellnessItem ->soreness }}
                                    </li> 
                                    <li class="list-group-item">
                                      Fatigue: {{ $postWellnessItem ->fatigue }}
                                    </li> 
                                    <li class="list-group-item">
                                      Difficulty: {{ $postWellnessItem ->difficulty }}
                                    </li>
                                    <li class="list-group-item">
                                      Comment: {{ $postWellnessItem ->comment }}
                                    </li>
                                  </ul>
                              
                            </div>
                          @empty
                            <p>You have no results</p>
                          @endforelse
                        </div>
                      </div>

                  </div> --}}
                @empty
                @endforelse
                </div>
              </div>
            </div>
          </div>
    </div>
    </div>
  
  
    @endsection