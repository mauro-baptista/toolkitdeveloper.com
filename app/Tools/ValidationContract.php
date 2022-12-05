<?php

namespace App\Tools;

use Illuminate\Support\Facades\Validator;

abstract class ValidationContract
{
    public function validate(array $request): array
    {
        $rules = (method_exists($this, 'rules')) ? $this->rules() : null;

        abort_unless(is_array($rules), 422, 'Validation rules not properly set');

        $validator = Validator::make($request, $rules);

        $validator->validate();

        return $validator->validated();
    }
}
