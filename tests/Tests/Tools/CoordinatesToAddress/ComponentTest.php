<?php

namespace Tests\Tests\Tools\CoordinatesToAddress;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ComponentTest extends TestCase
{
    /** @test */
    public function tool_page()
    {
        $this->get('/tools/coordinates_to_address')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Tools/CoordinatesToAddress')
                ->missing('slug')
            );
    }
}
