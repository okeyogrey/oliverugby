<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Event::create([
            'title' => 'Season Opening Ceremony',
            'description' => 'Kick-off event for the new Olive Rugby season with fan activities, team introductions, and entertainment.',
            'start_at' => now()->addDays(10),
            'end_at' => now()->addDays(10)->addHours(4),
            'location' => 'Olive Rugby Grounds',
        ]);
    }
}
