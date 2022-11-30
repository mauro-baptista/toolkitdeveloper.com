<?php

namespace App\Providers;

use App\Tools\Slugify;
use App\Tools\Tool;
use App\Tools\Tools;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(Tools::class, function () {
            $tools = [
                'slugify' => new Tool(
                    handler: new Slugify\Handler(),
                    inertia: new Slugify\Inertia(config('tools.slugify.component')),
                    validation: new Slugify\Validation() ,
                ),
            ];

            return new Tools($tools);
        });
    }
}
