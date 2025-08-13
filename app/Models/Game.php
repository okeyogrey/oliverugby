<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'opponent',
        'match_at',
        'our_score',
        'opponent_score',
        'venue',
    ];

    protected $casts = [
        'match_at' => 'datetime',
    ];
}
