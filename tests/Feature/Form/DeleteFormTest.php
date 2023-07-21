<?php

namespace Tests\Feature\Form;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteFormTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {

        $this->withoutVite();

        $response = $this->get('/forms/7bbc275b-b13b-433b-890e-e986b7c28977/delete');

        $response->assertStatus(200);
    }

    public function test_handle(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/forms/7bbc275b-b13b-433b-890e-e986b7c28977/delete',
            [
                'form_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
            ],
        );

        $response->assertStatus(200);
    }
}
