@extends('layouts.app')
@section('content')
<div class="container justify-content-center">

    <div class="row justify-content-center">
      <div class="col-md-10">
          <div class="card">
              <div class ="card-header">
                  <h4>My Users</h4>
                
              </div>
              

              <div class = "card-body">
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
                               Roles
                          </th> 
                            <th>
                                Actions
                          </th> 
                          </tr>
                      </thead>

                  @foreach($users as $user)
<tr>
    <td scope="row">{{ $user->id}}</td>
    <td>
                  {{ $user->name}} 
    </td>
    <td>
        {{ $user->email}}
    </td>
    <td>
        {{ implode(',', $user->roles()->get()->pluck('name')->toArray())}}
    </td>
    <td>

        <a href="{{ route('admin.users.edit', $user->id)}}">
            <button type="button" class="btn btn-primary float-left">
                Edit
            </button>
        </a>

        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left">
            @csrf
            {{ method_field('DELETE')}}
            <button type="submit" class="btn btn-warning float-left">
                Delete
            </button>
        </form> 


    </td>
</tr>

                  @endforeach
                  </table>
              </div>

          </div>
      </div>
    </div>
</div>
@endsection




