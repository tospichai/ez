<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CountModel;
use App\Models\DailyModel;
use Carbon\Carbon;

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
        $daily = CountModel::count('date');
        $month = DailyModel::whereMonth('date', '=', Carbon::today()->format('m'))->sum('num') + CountModel::count('date');
        $all = DailyModel::sum('num') + CountModel::count('date');
        view::share(compact('daily', 'month', 'all'));
    }
}
