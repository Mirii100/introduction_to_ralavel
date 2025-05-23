<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;   // ← add this
 
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
   public function boot()
    {
        // In production, if the 'programs' table is missing, run migrations
        if (app()->environment('production') && ! Schema::hasTable('programs')) {
            Artisan::call('migrate', ['--force' => true]);
        }
    }
}
