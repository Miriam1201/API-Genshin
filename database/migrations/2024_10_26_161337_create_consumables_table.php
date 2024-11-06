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
        Schema::create('consumables', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('rarity');
            $table->string('type');
            $table->text('effect')->nullable();
            $table->boolean('has_recipe')->default(false);
            $table->text('description')->nullable();
            $table->integer('proficiency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumables');
    }
};
