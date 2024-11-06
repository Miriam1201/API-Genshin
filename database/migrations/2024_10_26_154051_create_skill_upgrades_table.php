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
        Schema::create('skill_upgrades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skill_talent_id');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
            $table->foreign('skill_talent_id')->references('id')->on('skill_talents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_upgrades');
    }
};
