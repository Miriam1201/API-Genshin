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
            $table->string('id')->primary();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('vision')->nullable();
            $table->string('weapon')->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('nation')->nullable();
            $table->string('affiliation')->nullable();
            $table->integer('rarity')->nullable();
            $table->date('release')->nullable();
            $table->string('constellation')->nullable();
            $table->date('birthday')->nullable();
            $table->text('description')->nullable();
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
