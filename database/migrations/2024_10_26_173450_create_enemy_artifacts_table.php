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
        Schema::create('enemy_artifacts', function (Blueprint $table) {
            $table->id();
            $table->string('enemy_id');
            $table->string('artifact_name');
            $table->string('set_name');
            $table->string('rarity');
            $table->foreign('enemy_id')->references('id')->on('enemies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enemy_artifacts');
    }
};
