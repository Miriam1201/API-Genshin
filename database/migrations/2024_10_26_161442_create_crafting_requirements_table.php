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
        Schema::create('crafting_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('potion_id');
            $table->string('item_name');
            $table->integer('quantity');
            $table->foreign('potion_id')->references('id')->on('potions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crafting_requirements');
    }
};
