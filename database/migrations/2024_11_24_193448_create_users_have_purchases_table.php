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
            $table->integer('user_id');
            $table->json('games');
            $table->text('status');
            $table->dateTime("release_date");

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
