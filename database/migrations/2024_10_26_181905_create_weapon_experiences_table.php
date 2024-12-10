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
        if (!Schema::hasTable('weapon_experience')) {
            Schema::create('weapon_experience', function (Blueprint $table) {
                $table->string('id', 50)->primary();
                $table->string('name', 50);
                $table->integer('experience');
                $table->integer('rarity');
                $table->json('source');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weapon_experiences');
    }
};