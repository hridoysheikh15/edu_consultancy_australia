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
        Schema::create('plan_higher_education', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('header')->nullable();
            $table->string('card_header_one')->nullable();
            $table->string('card_header_two')->nullable();
            $table->string('card_header_three')->nullable();
            $table->text('card_description_one')->nullable();
            $table->text('card_description_two')->nullable();
            $table->text('card_description_three')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_higher_education');
    }
};
