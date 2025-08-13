<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Post::create([
            'title' => 'Legacy in Every Tackle Launch',
            'slug' => 'legacy-in-every-tackle-launch',
            'excerpt' => 'Olive Rugby officially launches its flagship program, Legacy in Every Tackle.',
            'body' => '<p>The Olive Rugby Club is proud to launch its new community and development program, "Legacy in Every Tackle". This initiative aims to empower youth through rugby, leadership, and life skills.</p>',
            'hero_image' => null,
            'published_at' => now(),
        ]);
    }
}
