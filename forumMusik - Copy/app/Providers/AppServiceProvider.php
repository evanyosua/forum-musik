<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Genre;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //untuk hostinger

        //$this->app->bind('path.public', function () {
        //    return realpath(base_path() . '/../public_html');
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(150);


        Paginator::useBootstrap();
    }
}
