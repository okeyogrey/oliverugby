<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Game::create([
            'opponent' => 'Nairobi Warriors',
            'match_at' => now()->addDays(15)->setTime(15, 0),
            'our_score' => null,
            'opponent_score' => null,
            'venue' => 'Olive Rugby Grounds',
        ]);
    }
}
