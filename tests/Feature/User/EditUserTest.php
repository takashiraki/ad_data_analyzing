<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use SebastianBergmann\Type\VoidType;
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

    public function test_handle(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . '/update',
            [
                'user_id' => $this->id,
                'user_name' => 'hogehoge',
                'email' => $_ENV['TEST_MAIL'],
                'privilege' => 'admin',
            ],
        );

        $response->assertStatus(200);
    }

    public function test_handle_bad_name(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . '/update',
            [
                'user_id' => $this->id,
                'user_name' => 'hogehogehogehogehogehogeohgeohgeohgeohgehogehogehoge',
                'email' => $_ENV['TEST_MAIL'],
                'privilege' => 'admin',
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_not_equal_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . '33/update',
            [
                'user_id' => $this->id,
                'user_name' => 'hogehoge',
                'email' => $_ENV['TEST_MAIL'],
                'privilege' => 'admin',
            ],
        );

        $response->assertStatus(500);
    }

    public function test_handle_bad_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . '/update',
            [
                'user_id' => $this->id . '33',
                'user_name' => 'hogehoge',
                'email' => $_ENV['TEST_MAIL'],
                'privilege' => 'admin',
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_email(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . '/update',
            [
                'user_id' => $this->id,
                'user_name' => 'hogehoge',
                'email' => 'hogehoge@hogehoge.hoge',
                'privilege' => 'admin',
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_privilege(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/' . $this->id . '/update',
            [
                'user_id' => $this->id,
                'user_name' => 'hogehoge',
                'email' => $_ENV['TEST_MAIL'],
                'privilege' => 'hoge',
            ],
        );

        $response->assertStatus(500);
    }
}
