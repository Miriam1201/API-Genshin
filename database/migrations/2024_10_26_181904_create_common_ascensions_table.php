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
        if (!Schema::hasTable('common_ascension')) {
            Schema::create('common_ascension', function (Blueprint $table) {
                $table->string('id', 50)->primary();
                $table->string('type', 50);
                $table->json('characters');
                $table->json('weapons');
                $table->json('items');
                $table->json('sources');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_ascensions');
    }
};