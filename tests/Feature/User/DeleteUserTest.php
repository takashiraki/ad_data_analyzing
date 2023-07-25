<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    private $id = "7bbc275b-b13b-433b-890e-e986b7c28977";
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $this->withoutVite();

        $response = $this->get('/users/' . $this->id . '/delete');

        $response->assertStatus(200);
    }

    public function test_handle(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . '/delete',
            [
                'user_id' => $this->id,
            ],
        );

        $response->assertStatus(200);
    }

    public function test_handle_bad_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . '/delete',
            [
                'user_id' => $this->id . '3333',
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_not_equal_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . 'hoge/delete',
            [
                'user_id' => $this->id,
            ],
        );

        $response->assertStatus(500);
    }
}
