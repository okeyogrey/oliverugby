<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'home_team',
        'away_team',
        'poster',
        'match_at',
        'home_score',
        'away_score',
        'venue',
        'notes',
    ];

    protected $casts = [
        'match_at' => 'datetime',
    ];
}
