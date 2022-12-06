<?php

namespace Tests\Tests\Tools\CoordinatesToAddress;

use App\Tools\CoordinatesToAddress\Validation;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    public function provider(): array
    {
        return [
            'latitude out of range (below)' => ['latitude', -91, 'between'],
            'missing latitude' => ['latitude', null, 'required'],
            'latitude out of range (greater)' => ['latitude', 91, 'between'],
            'missing longitude' => ['longitude', null, 'required'],
            'longitude out of range (below)' => ['longitude', -181, 'between'],
            'longitude out of range (greater)' => ['longitude', 181, 'between'],
        ];
    }

    /**
     * @test
     * @dataProvider provider
     */
    public function failed_validation(string $field, mixed $input, string $rule)
    {
        try {
            (new Validation())->validate(array_merge([
                'latitude' => -81.5190288,
                'longitude' => 28.3682707,
            ], [
               $field => $input
            ]));

            $this->fail('Request shouldn\'t be valid');
        } catch (ValidationException $exception) {
            $failedRule = strtolower(array_keys($exception->validator->failed()[$field])[0]);

            $this->assertEquals($rule, $failedRule);
        }
    }

    /** @test */
    public function slug_validation()
    {
        $validated = (new Validation())->validate([
            'latitude' => -81.5190288,
            'longitude' => 28.3682707,
        ]);

        $this->assertEquals(-81.5190288, $validated['latitude']);
        $this->assertEquals(28.3682707, $validated['longitude']);
    }
}

