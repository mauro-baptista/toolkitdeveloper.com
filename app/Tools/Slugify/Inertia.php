<?php

namespace App\Tools\Slugify;

use App\Tools\InertiaContract;
use Inertia\Response;

class Inertia implements InertiaContract
{
    public function __construct(private string $component) {}

    public function render(array $props): Response
    {
        return \Inertia\Inertia::render($this->component, $props);
    }
}
