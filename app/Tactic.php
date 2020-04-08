<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tactic extends Model
{
    protected $table = 'tactics';

    public $primaryKey = 'id';

    public $timestamps = true;
}
