<?php

namespace Tests\Feature\MediumDtl;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddMediumDtlInfoTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_save_medium_dtl_info(): void
    {
        $response = $this->post(
            '/medium-dtls/store',
            [
                'medium_dtl_name' => 'hoge fuga',
                'medium_id' => 1,
            ]
        );

        $response->assertStatus(200);
    }
}
