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
        Schema::create('domain_rewards', function (Blueprint $table) {
            $table->id();
            $table->string('domain_id');
            $table->string('day');
            $table->integer('level');
            $table->integer('adventure_experience');
            $table->integer('companionship_experience');
            $table->integer('mora');
            $table->string('item_name');
            $table->integer('drop_min');
            $table->integer('drop_max');
            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_rewards');
    }
};
