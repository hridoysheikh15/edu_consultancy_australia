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
        Schema::table('contact_us', function (Blueprint $table) {
            $table->string('phone')->change();
            $table->string('code', 5)->after('phone')->nullable();

            // Drop 'nasionality' column if it exists
            if (Schema::hasColumn('contact_us', 'nasionality')) {
                $table->dropColumn('nasionality');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            // Revert phone back to integer
            $table->integer('phone')->change();
            $table->dropColumn('code');
            $table->string('nasionality')->nullable(); 
        });
    }
};

