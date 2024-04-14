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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('splash_art');
            $table->string('name');
            $table->text('description');
            $table->enum('rarity', [null, 4, 5])->nullable();
            $table->enum('type', ['Playable Character', 'NPC']);
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->foreignId('world_id')->constrained()->cascadeOnDelete();
            $table->foreignId('faction_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamp('first_appearance');
            $table->json('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
