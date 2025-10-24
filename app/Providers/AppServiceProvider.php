<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\SiteSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ensure the table exists before querying
        if (Schema::hasTable('site_settings')) {
            $site_setting = SiteSetting::first();
            View::share('site_setting', $site_setting);
        }

        

        Paginator::useBootstrap();
    }
}
