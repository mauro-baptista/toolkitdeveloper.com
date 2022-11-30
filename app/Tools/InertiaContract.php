<?php

namespace App\Tools;

use Inertia\Response;

interface InertiaContract
{
    public function __construct(string $component);

    public function render(array $props): Response;
}
