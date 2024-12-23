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
        if (!Schema::hasTable('character_ascension')) {
            Schema::create('character_ascension', function (Blueprint $table) {
                $table->string('id', 50)->primary();
                $table->string('type', 50)->nullable();
                $table->string('name', 50)->nullable();
                $table->json('sources');
                $table->integer('rarity')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_ascensions');
    }
};