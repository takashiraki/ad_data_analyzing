<?php

namespace Tests\Feature\Url;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchUrlTest extends TestCase
{
    /**
     * A basic index test
     */
    public function test_index(): void
    {
        $response = $this->get('/ulrs');

        $response->assertStatus(200);
    }
}
