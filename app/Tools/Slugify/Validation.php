<?php

namespace App\Tools\Slugify;

use App\Tools\ValidationContract;

class Validation extends ValidationContract
{
    protected function rules(): array
    {
        return [
            'text' => ['required', 'min:3', 'max:512'],
        ];
    }
}
