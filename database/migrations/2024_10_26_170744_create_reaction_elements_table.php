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
        Schema::create('reaction_elements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reaction_id');
            $table->string('element_name');
            $table->foreign('reaction_id')->references('id')->on('elemental_reactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reaction_elements');
    }
};
