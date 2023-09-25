<?php

namespace App\Providers;

use App\Models\category;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('layouts.frontend.frontendapp', function ($view) {

            $view->with('categories', category::with('subcategories')->get());

            
        });
    }
}
