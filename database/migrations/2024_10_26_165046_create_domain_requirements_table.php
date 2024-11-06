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
        Schema::create('domain_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('domain_id');
            $table->integer('level');
            $table->integer('adventure_rank');
            $table->integer('recommended_level');
            $table->text('ley_line_disorder')->nullable();
            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_requirements');
    }
};
