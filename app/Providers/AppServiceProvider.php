<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.sidebar', function($view){
            $view->with('categories', \App\Category::getCategories());
        });

        view()->composer('layouts.sidebar', function($view){
            $view->with('facebook', Storage::get('public/soc-icons/facebook.txt'));
        });

        view()->composer('layouts.sidebar', function($view){
            $view->with('twitter', Storage::get('public/soc-icons/twitter.txt'));
        });

        view()->composer('layouts.sidebar', function($view){
            $view->with('google', Storage::get('public/soc-icons/google.txt'));
        });

        view()->composer('layouts.sidebar', function($view){
            $view->with('youtube', Storage::get('public/soc-icons/youtube.txt'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
