<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $table = 'goals';

    public $primaryKey = 'id';

    public $timestamps = true;


    //Post belongs to a user

    public function user(){
        return $this->belongsTo('App\User'); 
    }
}
