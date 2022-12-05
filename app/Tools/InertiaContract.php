<?php

namespace App\Tools;

use Inertia\Response;

abstract class InertiaContract
{
    public function __construct(private string $config) {}

    public function render(array $props): Response
    {
        $config = config('tools.' . $this->config);

        abort_if($config === null, 400, 'Invalid config');

        return \Inertia\Inertia::render($config['component'], array_merge($props, [
            'name' => $config['name'],
            'description' => $config['description'],
        ]));
    }
}
