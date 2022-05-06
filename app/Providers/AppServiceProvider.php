<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        // Validator::extend('minimal_minutes_range', function ($attribute, $value, $parameters, $validator) {

        //     $timeBeginning = Carbon::parse($parameters[0]); // do confirm the date format.
        //     $timeEnd = Carbon::parse($value);

        //     return $timeBeginning->diffInMinutes($timeEnd) <= $parameters[1];
        // },'The time column must be at least 50 minutes after awal.');
    }
}
