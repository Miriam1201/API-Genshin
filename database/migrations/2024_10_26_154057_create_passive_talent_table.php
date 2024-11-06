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
        Schema::create('passive_talents', function (Blueprint $table) {
            $table->id();
            $table->string('character_id');
            $table->string('name');
            $table->string('unlock')->nullable();
            $table->text('description')->nullable();
            $table->integer('level')->nullable();
            $table->timestamps();
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passive_talent');
    }
};
