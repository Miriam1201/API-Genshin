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
        if (!Schema::hasTable('talent_boss')) {
            Schema::create('talent_boss', function (Blueprint $table) {
                $table->string('id', 50)->primary();
                $table->string('name', 50);
                $table->json('characters');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talent_bosses');
    }
};