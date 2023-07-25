<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchUserTest extends TestCase
{
    private $bad_name = 'hogehogehogehogehogehogehogehogehogehogehogehogehge';
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $this->withoutVite();

        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function test_index_all_null(): void
    {
        $this->withoutVite();

        $response = $this->get('/users?user_name=&email=&privilege=');

        $response->assertStatus(200);
    }

    public function test_index_only_name(): void
    {
        $this->withoutVite();

        $response = $this->get('/users?user_name=hogehoge&email=&privilege=');

        $response->assertStatus(200);
    }

    public function test_index_only_email(): void
    {
        $this->withoutVite();

        $response = $this->get('/users?user_name=&email=hoge&privilege=');

        $response->assertStatus(200);
    }

    public function test_index_only_privilege(): void
    {
        $this->withoutVite();

        $response = $this->get('/users?user_name=&email=&privilege=admin');

        $response->assertStatus(200);
    }

    public function test_index_all(): void
    {
        $this->withoutVite();

        $response = $this->get('/users?user_name=hoge&email=hoge&privilege=admin');

        $response->assertStatus(200);
    }

    public function test_index_abad_name(): void
    {
        $this->withoutVite();

        $response = $this->get('/users?user_name=' . $this->bad_name . '&email=&privilege=');

        $response->assertStatus(500);
    }

    public function test_index_bad_privilege(): void
    {
        $this->withoutVite();

        $response = $this->get('/users?user_name=&email=&privilege=hoge');

        $response->assertStatus(500);
    }
}
