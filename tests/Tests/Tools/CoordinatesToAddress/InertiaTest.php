<?php

namespace Tests\Tests\Tools\CoordinatesToAddress;

use App\Tools\CoordinatesToAddress\Inertia;
use Inertia\Response;
use Tests\TestCase;

class InertiaTest extends TestCase
{
    /** @test */
    public function inertia_component()
    {
        $inertia = (new Inertia('coordinates_to_address'))->render([
            'address' => 'sample-value'
        ]);

        $this->assertInstanceOf(Response::class, $inertia);
    }
}
