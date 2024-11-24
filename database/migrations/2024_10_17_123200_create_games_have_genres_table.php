<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games_have_genres', function (Blueprint $table) {
            $table->unsignedSmallInteger('genre_fk');
            $table->foreignId('game_fk')->constrained(table: 'games', column: 'id_game');
            $table->foreign('genre_fk')->references('genre_id')->on('genres');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_have_genres');
    }
};
