<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable(); // profile photo
            $table->string('position')->nullable();
            $table->string('team')->default('current'); // current / past
            $table->unsignedInteger('games_played')->default(0);
            $table->unsignedInteger('tries_scored')->default(0);
            $table->unsignedInteger('tackles')->default(0);
            $table->text('bio')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
