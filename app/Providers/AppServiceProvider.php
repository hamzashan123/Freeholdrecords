<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use View;
use Illuminate\Support\ServiceProvider;
use DB;

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
        Paginator::useBootstrap();

        $searchesData = DB::table('searches')->orderBy('name')->get();
        View::share ('searchdata', $searchesData );
    }
}
