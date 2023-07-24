<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $this->withoutVite();

        $response = $this->get('/users/create');

        $response->assertStatus(200);
    }

    public function test_handle(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/store',
            [
                'user_name' => 'hoge user1',
                'email' => $_ENV['TEST_MAIL'],
                'password' => 'hogehogehogehoge',
                'password_confirmation' => 'hogehogehogehoge',
                'privilege' => 'admin',
            ],
        );

        $response->assertStatus(200);
    }

    public function test_handle_bad_name(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/store',
            [
                'user_name' => 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge',
                'email' => $_ENV['TEST_MAIL'],
                'password' => 'hogehogehogehoge',
                'password_confirmation' => 'hogehogehogehoge',
                'privilege' => 'agency'
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_email(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/store',
            [
                'user_name' => 'hogehoge',
                'email' => 'hogehoge@hoge.hoge',
                'password' => 'hogehoge',
                'password_confirmation' => 'hogehoge',
                'privilege' => 'owner',
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_short_password(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/store',
            [
                'user_name' => 'hogehoge',
                'email' => $_ENV['TEST_MAIL'],
                'password' => 'hoge',
                'password_confirmation' => 'hoge',
                'privilege' => 'affiliater'
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_not_equal_email(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/store',
            [
                'user_name' => 'hoge',
                'email' => $_ENV['TEST_MAIL'],
                'password' => 'hogehogehoge',
                'password_confirmation' => 'hogehogehogehogehoge',
                'privilege' => 'admin',
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_privilege(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/users/store',
            [
                'user_name' => 'hoge',
                'email' => $_ENV['TEST_MAIL'],
                'password' => 'hogehogehoge',
                'password_confirmation' => 'hogehogehoge',
                'privilege' => 'hoge',
            ],
        );

        $response->assertStatus(500);
    }
}
