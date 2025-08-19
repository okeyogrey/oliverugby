<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name', 'jersey_number', 'photo', 'position', 'team',
        'games_played', 'tries_scored', 'tackles', 'bio', 'age', 'height', 'weight'
    ];
}
