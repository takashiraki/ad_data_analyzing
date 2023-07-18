<?php

namespace Tests\Feature\Medium;

use Tests\TestCase;

class MediumListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/medium/list');

        $response->assertStatus(200);
    }
}
