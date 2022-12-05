<?php

namespace App\Providers;

use App\Services\Geo\GeoService;
use App\Services\Geo\GoogleMaps;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            GeoService::class,
            fn () => new GoogleMaps(config('services.google_maps.key'))
        );
    }
}
