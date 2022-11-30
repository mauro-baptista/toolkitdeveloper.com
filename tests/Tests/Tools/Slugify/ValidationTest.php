<?php

namespace Tests\Tests\Tools\Slugify;

use App\Tools\Slugify\Validation;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    public function provider(): array
    {
        return [
            'few letters than allowed' => ['ab', 'min'],
            'more letter than allowed' => [str('a')->repeat(513)->toString(), 'max'],
            'missing text' => ['', 'required'],
        ];
    }

    /**
     * @test
     * @dataProvider provider
     */
    public function failed_slug_validation(string $input, string $rule)
    {
        try {
            (new Validation())->validate([
                'text' => $input
            ]);

            $this->fail('Request shouldn\'t be valid');
        } catch (ValidationException $exception) {
            $failedRule = strtolower(array_keys($exception->validator->failed()['text'])[0]);

            $this->assertEquals($rule, $failedRule);
        }
    }

    /** @test */
    public function slug_validation()
    {
        $validated = (new Validation())->validate([
            'text' => 'Proper Value',
        ]);

        $this->assertEquals('Proper Value', $validated['text']);
    }
}
