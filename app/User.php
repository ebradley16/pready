<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function goals(){
        return $this->hasMany('App\Goal');
    }

    public function roles(){
        /** 
        * This has setup a bi-directional relation ship between the two tables
        */
        return $this->belongsToMany('App\Role');
    }

    //decision making functions deciding weather someone can log in at all
    public function hasAnyRoles($roles){
if($this->roles()->whereIn('name', $roles)->first()){
    return true;
}
return false;
    }
//can someone login with a specific access level admin/authot/user
    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
            }

    public function readinessResults()
    {
        return $this->hasMany(PreReadiness::class, 'user_id');
    }

}
