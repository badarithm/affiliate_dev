<?php

namespace App\Providers;

use App\Models\Dtos\DistanceInterface;
use App\Services\DistanceFormulas\HaversineFormula;
use App\Services\DistanceFormulas\SurfaceDistanceFormulaInterface;
use Illuminate\Support\Collection;
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

        Collection::macro('withinRadius', function (float|int $limit): Collection {
            return $this->filter(function (DistanceInterface $entry) use ($limit): bool {
                return $entry->getDistance() <= $limit;
            });
        });

        Collection::macro('sortByRadius', function (): Collection {
            return $this->sortBy(function (DistanceInterface $entry, $key): bool {
                return $entry->getDistance();
            });
        });
    }
}
