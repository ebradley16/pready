<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostWellness extends Model
{
    protected $table = 'post_wellness';

    protected $fillable = [
        'user_id', 'intensity', 'rpe', 'satisfaction', 'soreness', 'fatigue', 'difficulty', 'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
