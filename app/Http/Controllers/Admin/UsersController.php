<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\PreReadiness;
use App\PostWellness;
use Gate;
use DB;
use Auth;
use Illuminate\Auth\Access\Gate as AccessGate;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct() 
    {
    $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {
        $users=User::all();

        return view("admin.users.index")->with('users',$users);

    }

    public function team()

    {
       
        $manager_id = Auth::user()->id;

        $team=User::where('manager_id', $manager_id)->get();

        $team->map(function ($player) {

            $Player_Id= $player['id'];

 

            $created_at = PreReadiness::select('created_at')->where('user_id',$Player_Id)->orderBy('created_at', 'desc')->first();

            if ( $created_at != null){
                $player['PreReadiness'] = $created_at->created_at;
            } else{
                $player['PreReadiness'] = "No Results";
            }

            $created_at = PostWellness::select('created_at')->where('user_id',$Player_Id)->orderBy('created_at', 'desc')->first();

            if ( $created_at != null){
                $player['PostWellness'] = $created_at->created_at;
            } else{
                $player['PostWellness'] = "No Results";
            }
            
            return $player;

        });

        //you need for each player the last readiness date
        // for each player the last postwellnesss date


        return view("admin.users.team")->with('users',$team);

    }

    public function show($id)
    {
        $user     = User::find($id);
        $roles    = Role::all();
        $managers = Role::where('name', 'manager')->first()->users()->get();


        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles, 
            'managers' => $managers
            ]);

    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }


        $roles    = Role::all();
        $managers = Role::where('name', 'manager')->first()->users()->get();


        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles, 
            'managers' => $managers
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
  
        $name = $request->input('name');

        $email = $request->input('email');

        $manager_id = $request->input('manager_id');


        $id = $user->id;

        


        if(DB::update('update users set name = ?,email = ?,manager_id =? where id = ?',[$name,$email,$manager_id,$id])){
            $request->session()->flash('success','User has been updated');
        }else{
            $request->session()->flash('error', 'Error trying to update user');
        }

       
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }
        $user->roles()->detach();  //prevents orphans
        $user->delete();

        return redirect()->route('admin.users.index');
    }

}