@extends('layouts.app')


@section('scripts')

<script type="text/javascript">

    $(document).ready(function() {
alert("test");
        $("._std_tab").each(function() {
            const $this = $(this);
            $this.addClass("table");
            $this.addClass("table-responsive");
            $this.addClass("table-bordered");
            $this.addClass("table-condensed");
            $this.addClass("table_style");
        });

</script>
@endsection

@section('content')
<div class="container justify-content-center">

    <div class="row justify-content-center">
      <div class="col-md-10">
          <div class="card">
              <div class ="card-header">
                  <h4>My Team</h4>
                
              </div>
              <div class = "card-body">
                  {{-- //Table Header --}}
                  <table class="table table-responsive table-bordered table-condensed">
                      <thead>
                        <tr>
                            <th>
                                #
                            </th>
                              <th>
                                  Name
                              </th>
                              <th>
                                  Email
                            </th> 
                            <th>
                               Pre Readiness
                          </th> 
                            <th>
                                Post Wellness
                          </th> 
                          <th>

                          </th> 
                          <th>

</th> 
                          <th>

</th> 
                          </tr>
                      </thead>

                {{-- //Table Body --}}
                  @foreach($users as $user)
                      <tbody>
                        <tr>
                            <td scope="row">
                               {{ $user->id}}
                            </td>
                            <td>
                               {{ $user->name}} 
                            </td>
                             <td>
                                {{ $user->email}}
                            </td>
                            <td>
                                {{ $user->PreReadiness}}
                            </td>
                            <td>
                                {{ $user->PostWellness}}
                            </td>
                            <td>
                                <a href="/honkydoryusers/{{$user->id}}" class="btn btn-primary" style="float:right"hp>Edit</a>
                            </td>
                            <td>
                                <a href="/honkydoryusers/{{$user->id}}" class="btn btn-primary" style="float:right"hp>Delete</a>
                            </td>
                            <td>
                                <a href="/honkydoryreadiness/{{$user->id}}" class="btn btn-primary" style="float:right"hp>View</a>
                             
                            </td>
                        </tr>
                      </tbody>

                  @endforeach
                </table>
                </div>

          </div>
      </div>
    </div>
</div>



@endsection





