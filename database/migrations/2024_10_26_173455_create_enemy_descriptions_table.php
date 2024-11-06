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
        Schema::create('enemy_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('enemy_id');
            $table->string('description_name');
            $table->text('description');
            $table->foreign('enemy_id')->references('id')->on('enemies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enemy_descriptions');
    }
};
