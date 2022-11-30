<?php

namespace Tests\Tests\Tools\Slugify;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ComponentTest extends TestCase
{
    /** @test */
    public function tool_page()
    {
        $this->get('/tools/slugify')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Tools/Slugify')
                ->missing('slug')
            );
    }
}
