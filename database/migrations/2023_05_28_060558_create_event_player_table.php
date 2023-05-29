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
        Schema::create('event_player', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->foreignId('player_id');
            $table->string('number')->nullable();
            $table->string('finalRating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_player');
    }
};
