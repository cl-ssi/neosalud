<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use App\Charts\Samu\SampleChart;
use App\Charts\Samu\EventLastMonth;
use App\Charts\Samu\EventBySex;

use App\Charts\Samu\EventByMonth;
use App\Charts\Samu\EventByMobile;
use App\Charts\Samu\EventByCommune;

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
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });
    }
}
