<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Sponsor::create([
            'name' => 'Olive Rugby Gold Partner',
            'logo' => null,
            'tier' => 'gold',
            'website' => 'https://example.com',
            'notes' => 'Main funding partner for the 2025 season.',
        ]);
    }

}
