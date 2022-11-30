<?php

namespace Tests\Tests\Tools\Slugify;

use App\Tools\Slugify\Handler;
use Tests\TestCase;

class HandlerTest extends TestCase
{
    public function provider(): array
    {
        return [
            'capital letter' => ['This IS a Sample', 'this-is-a-sample'],
            'number' => ['This is a sample 123', 'this-is-a-sample-123'],
            'symbol' => ['This is a $#& sample', 'this-is-a-sample'],
            'internation' => ['Thιs ïs α sámplê', 'this-is-a-sample'],
        ];
    }

    /**
     * @test
     * @dataProvider provider
     */
    public function slug_generation(string $input, string $expected)
    {
        $generated = (new Handler())->generate([
            'text' => $input
        ]);

        $this->assertEquals($expected, $generated['slug']);
    }
}
