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
        Schema::create('study_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('section_one_header')->nullable();
            $table->text('section_one_description')->nullable();
            $table->string('section_one_image')->nullable();
            $table->string('section_two_header')->nullable();
            $table->text('section_two_description')->nullable();
            $table->string('section_three_header')->nullable();
            $table->string('section_three_description')->nullable();
            $table->string('section_three_image')->nullable();
            $table->string('section_four_header')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_destinations');
    }
};
