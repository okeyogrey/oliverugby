<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'hero_image')) {
                $table->string('hero_image')->nullable();
            }
        });

        Schema::table('events', function (Blueprint $table) {
            if (!Schema::hasColumn('events', 'banner')) {
                $table->string('banner')->nullable();
            }
        });

        Schema::table('games', function (Blueprint $table) {
            if (!Schema::hasColumn('games', 'poster')) {
                $table->string('poster')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'hero_image')) {
                $table->dropColumn('hero_image');
            }
        });

        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'banner')) {
                $table->dropColumn('banner');
            }
        });

        Schema::table('games', function (Blueprint $table) {
            if (Schema::hasColumn('games', 'poster')) {
                $table->dropColumn('poster');
            }
        });
    }
};
