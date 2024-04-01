<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
        use Illuminate\Support\Facades\DB;
        use Illuminate\Support\Facades\Log;
        use Illuminate\Support\Facades\Validator;
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
        Paginator::useBootstrap();
        DB::listen(function($query){
            Log::info($query->sql);
        });

        Validator::extend('sex',function ($attr,$value,$params){
            return ($value=='男' or $value='女');
        });
    }
}
