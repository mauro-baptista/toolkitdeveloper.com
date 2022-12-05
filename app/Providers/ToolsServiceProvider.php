<?php

namespace App\Providers;

use App\Services\Geo\GeoService;
use App\Tools\Slugify;
use App\Tools\CoordinatesToAddress;
use App\Tools\Tool;
use App\Tools\Tools;
use Illuminate\Support\ServiceProvider;

class ToolsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Tools::class, function ($app) {
            $tools = [
                'slugify' => new Tool(
                    handler: new Slugify\Handler(),
                    inertia: new Slugify\Inertia('slugify'),
                    validation: new Slugify\Validation() ,
                ),
                'coordinates_to_address' => new Tool(
                    handler: new CoordinatesToAddress\Handler($app->make(GeoService::class)),
                    inertia: new CoordinatesToAddress\Inertia('coordinates_to_address'),
                    validation: new CoordinatesToAddress\Validation() ,
                ),
            ];

            return new Tools($tools);
        });
    }
}
