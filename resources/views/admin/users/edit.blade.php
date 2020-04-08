@extends('layouts.app')
@section('content')
<div class="container justify-content-center">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class ="card-header">Edit User {{ $user->name }}</div>

              <div class = "card-body">
                <form action="{{ route('admin.users.update',$user)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}

                    <label>Name</label>
                    <input type="text" name="name" value ={{$user->name}} />
                    <label>Email</label>
                    <input type="email" name="email" value ={{$user->email}} />

                    {{-- <label>Manager</label>
                    <input type="number" name="manager_id" value ={{$user->manager_id}} /> --}}

                    <div class="form-group">
                        {{Form::label('manager_id','Manager')}}
                        {{Form::select('manager_id',$managers->pluck('name','id'))}}
                    </div>


                    @foreach ($roles as $role)
                        <div class="form-check">
                            <input type="checkbox" name="roles[]" value="{{$role->id}}" {{$user->hasRole($role->name)?'checked="checked"':''}}>
                            <label>{{$role ->name}}</label>
                        

                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>
              </div>

          </div>
      </div>
    </div>
</div>
@endsection




