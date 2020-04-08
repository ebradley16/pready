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
                <h5>User Results: Total: {{ $playerGoals->count() }}</h5>
                
              </a>
            </div>
              <div class="card-body">
                @forelse ($team as $player)
                  <div class="row justify-content-center">
                    <strong>{{ $player->name }}</strong>
                  </div>
                  {{-- <div class="row">
                    <div class="col-md-6"> --}}
                      <div class="card">
                        <h5 class="card-header"  style="background-color:#90EE90;">
                          Player Goals
                        </h5>
                      </div>
                      @php
                      $i = 0
                      @endphp

                      @forelse ($playerGoals as $goalItem)
                        @if ( $goalItem->user_id == $player->id)
                        @php
                        $i = 1
                        @endphp
                          <div class="card">
                            <h5 class="card-header" style="background-color:#90EE90;">
                              <span class="float-right">
                                <b>Completed:</b> {{ $goalItem->created_at->toFormattedDateString() }}
                              </span>
                            </h5>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                <b>Goal:</b> {{ $goalItem->goal }}
                              </li>
                              <li class="list-group-item">
                                <b>Timeframe:</b> {{ $goalItem->timeframe }}
                              </li>
                              <li class="list-group-item">
                                <b>Behaviour Point:</b> {{ $goalItem->behaviour1 }}
                              </li>
                              <li class="list-group-item">
                                <b>Behaviour Point:</b> {{ $goalItem->behaviour2 }}
                              </li> 
                              <li class="list-group-item">
                                <b>Behaviour Point:</b> {{ $goalItem->behaviour3 }}
                              </li> 
                              {{-- <li class="list-group-item">
                                Achieved: {{ $goalItem->achieved }}
                              </li> --}}
                            </ul>
                          </div>
                        @endif
                       @empty
                      @endforelse

                      @if ($i==0)
                      <p>Player has no goals</p>
                      @endif

                      @empty
                      @endforelse
                {{-- </div> --}}
              {{-- </div> --}}
            </div>
          </div>
   
  
  
    @endsection




    {{-- @extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Player Goals</h2>
                  <a class="btn btn-danger" style="float:right"  href="{{route('manager')}}">BACK</a>

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
                {{-- <a href="/reports/{{$report->id}}" class="btn btn-primary" style="float:right"hp>Read</a>
                </div>
            @endforeach
           
         @else 
        <p>No reports found.</p>
         @endif
    </div>
    {{$reports->links()}}
  
@endsection --}} 