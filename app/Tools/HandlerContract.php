<?php

namespace App\Tools;

interface HandlerContract
{
    public function generate(array $request): array;
}
