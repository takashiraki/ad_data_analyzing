<?php

namespace Tests\Feature\MediumDtl;

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
