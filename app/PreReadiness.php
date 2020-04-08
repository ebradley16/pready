<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreReadiness extends Model
{
    protected $table = 'pre_readiness';

    protected $fillable = [
        'user_id', 'mood', 'sleep', 'hydration', 'soreness', 'fatigue', 'willingness', 'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


