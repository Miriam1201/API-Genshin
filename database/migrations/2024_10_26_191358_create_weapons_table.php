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
        Schema::create('weapons', function (Blueprint $table) {
            $table->string('id', 100)->primary();
            $table->string('name', 100);
            $table->string('type', 50);
            $table->integer('rarity');
            $table->integer('baseAttack');
            $table->string('subStat', 100)->nullable();
            $table->string('passiveName', 100)->nullable();
            $table->text('passiveDesc')->nullable();
            $table->string('location', 255)->nullable();
            $table->string('ascensionMaterial', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weapons');
    }
};
