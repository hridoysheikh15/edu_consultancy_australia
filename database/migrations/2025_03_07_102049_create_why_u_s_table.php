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
        Schema::create('why_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('header')->nullable();
            $table->string('card_image_one')->nullable();
            $table->string('card_image_two')->nullable();
            $table->string('card_image_three')->nullable();
            $table->string('card_image_four')->nullable();
            $table->string('card_header_one')->nullable();
            $table->string('card_header_two')->nullable();
            $table->string('card_header_three')->nullable();
            $table->string('card_header_four')->nullable();
            $table->text('card_description_one')->nullable();
            $table->text('card_description_two')->nullable();
            $table->text('card_description_three')->nullable();
            $table->text('card_description_four')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_u_s');
    }
};
