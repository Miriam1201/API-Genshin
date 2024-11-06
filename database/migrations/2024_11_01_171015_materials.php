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
        Schema::create('materials', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('name', 100);
            $table->string('category', 50);
            $table->text('description')->nullable();
            $table->json('characters')->nullable();
            $table->json('weapons')->nullable();
            $table->json('items')->nullable();
            $table->json('sources')->nullable();
            $table->string('type', 50)->nullable();
            $table->json('availability')->nullable();
            $table->string('source', 100)->nullable();
            $table->integer('rarity')->nullable();
            $table->integer('experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
