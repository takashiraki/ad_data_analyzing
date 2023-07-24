<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditUserTest extends TestCase
{
    private $id = "7bbc275b-b13b-433b-890e-e986b7c28977";
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $this->withoutVite();

        $response = $this->get('/users/' . $this->id . '/edit');

        $response->assertStatus(200);
    }

    public function test_index_bad_id(): void
    {
        $this->withoutVite();

        $response = $this->get('/users/hogehogehogehogehogehoge/edit');

        $response->assertStatus(500);
    }
}
