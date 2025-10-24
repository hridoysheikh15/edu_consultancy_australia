<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (Schema::hasColumn('site_settings', 'twitter')) {
                $table->dropColumn('twitter');
            }
            if (Schema::hasColumn('site_settings', 'google')) {
                $table->dropColumn('google');
            }

            if (!Schema::hasColumn('site_settings', 'instagram')) {
                $table->string('instagram')->after('facebook')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('google')->nullable();

            $table->dropColumn('instagram');
        });
    }
};
