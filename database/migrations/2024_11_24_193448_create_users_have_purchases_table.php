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
        Schema::create('users_have_purchases', function (Blueprint $table) {
            $table->smallIncrements('purchase_id');
            $table->foreignId('user_fk')->constrained(table: 'users', column: 'id');
            $table->foreignId('game_fk')->constrained(table: 'games', column: 'id_game');
            $table->float('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_have_purchases');
    }
};
