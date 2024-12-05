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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('main_dps', 100);
            $table->string('sub_dps', 100);
            $table->string('support', 100);
            $table->string('healer_shielder', 100);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('main_dps')->references('id')->on('characters')->onDelete('cascade');
            $table->foreign('sub_dps')->references('id')->on('characters')->onDelete('cascade');
            $table->foreign('support')->references('id')->on('characters')->onDelete('cascade');
            $table->foreign('healer_shielder')->references('id')->on('characters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};