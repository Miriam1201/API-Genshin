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
        Schema::create('talent_book', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('type', 50);
            $table->json('characters');
            $table->json('availability');
            $table->string('source', 100);
            $table->json('items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talent_books');
    }
};
