<?php

namespace Tests\Feature\Form;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchFormTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_first_index(): void
    {
        $response = $this->get('/forms');

        $response->assertStatus(200);
    }

    public function test_index(): void
    {
        $response = $this->get('/forms?form_name=hogehoge&form_directory=hoge3');

        $response->assertStatus(200);
    }

    public function test_index_bad_name(): void
    {
        $response = $this->get('/forms?form_name=123456789012345678901234567890123456789012345678901&form_directory=hoge3');

        $response->assertStatus(302);
    }

    public function test_index_bad_dir(): void
    {
        $response = $this->get('/forms?form_name=hogehoge&form_directory=hogehogehoge');

        $response->assertStatus(302);
    }

    public function test_index_only_name(): void
    {
        $response = $this->get('/forms?form_name=hogehoge&form_directory');

        $response->assertStatus(200);
    }

    public function test_index_only_dir(): void
    {
        $response = $this->get('/forms?form_name=&form_directory=hogehoge');

        $response->assertStatus(200);
    }

    public function test_index_all_null(): void
    {
        $response = $this->get('/forms?form_name=&form_directory=');

        $response->assertStatus(200);
    }
}
