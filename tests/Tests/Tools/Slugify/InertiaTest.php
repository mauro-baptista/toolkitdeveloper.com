<?php

namespace Tests\Tests\Tools\Slugify;

use App\Tools\Slugify\Inertia;
use Inertia\Response;
use Tests\TestCase;

class InertiaTest extends TestCase
{
    /** @test */
    public function inertia_component()
    {
        $inertia = (new Inertia('Tools/Slugify'))->render([
            'text' => 'sample-value'
        ]);

        $this->assertInstanceOf(Response::class, $inertia);
    }
}
