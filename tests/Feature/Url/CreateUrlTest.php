<?php

namespace Tests\Feature\Url;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUrlTest extends TestCase
{
    public function test_index(): void
    {
        $this->withoutVite();

        $response = $this->get('/urls/create');

        $response->assertStatus(200);
    }
}
