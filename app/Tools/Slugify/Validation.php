<?php

namespace App\Tools\Slugify;

use App\Tools\ValidationContract;
use Illuminate\Support\Facades\Validator;

class Validation implements ValidationContract
{
    public function validate(array $request): array
    {
        $validator = Validator::make($request, [
            'text' => ['required', 'min:3', 'max:512'],
        ]);

        $validator->validate();

        return $validator->validated();
    }
}
