<?php

namespace Tests\Feature\MediumDtl;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MediumDtlTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/medium-dtls');

        $response->assertStatus(200);
    }
}
