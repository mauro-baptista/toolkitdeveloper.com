<?php

namespace App\Tools;

interface ValidationContract
{
    public function validate(array $request): array;
}
