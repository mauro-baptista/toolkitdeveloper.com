<?php

namespace App\Tools\CoordinatesToAddress;

use App\Tools\ValidationContract;

class Validation extends ValidationContract
{
    public function rules(): array
    {
        return [
            'latitude' => ['required', 'between:-90,90'],
            'longitude' => ['required', 'between:-180,180'],
        ];
    }
}
