<?php

namespace App\Providers;

use App\Services\DistanceFormulas\HaversineFormula;
use App\Services\DistanceFormulas\SurfaceDistanceFormulaInterface;
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
        $this->app->singleton(SurfaceDistanceFormulaInterface::class, function(): SurfaceDistanceFormulaInterface {
            return new HaversineFormula();
        });
    }
}
