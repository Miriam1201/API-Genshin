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
        Schema::create('boss_artifacts', function (Blueprint $table) {
            $table->id();
            $table->string('boss_id');
            $table->string('name');
            $table->integer('max_rarity');
            $table->timestamps();

            $table->foreign('boss_id')->references('id')->on('bosses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boss_artifacts');
    }
};