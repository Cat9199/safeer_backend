<?php

namespace App\Providers;

use App\Importantlink;
use App\Language;
use App\UsefulLink;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (!app()->runningInConsole()) {
            $all_language = Language::all();
            Paginator::useBootstrap();
            if (get_static_option('site_force_ssl_redirection') === 'on') {
                URL::forceScheme('https');
            }
            View::share([
                'all_language' => $all_language
            ]);
        }
    }
}