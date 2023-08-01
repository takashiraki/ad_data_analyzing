<?php

namespace Tests\Feature\Url;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchUrlTest extends TestCase
{
    /**
     * A basic index test
     */
    public function test_index(): void
    {
        $response = $this->get('/urls');

        $response->assertStatus(200);
    }


    public function test_index_null(): void
    {
        $response = $this->get('/urls?url_name=&medium_name=&medium_dtl_name=&lp_name=&formname=');

        $response->assertStatus(200);
    }

    public function test_index_bad_url_name(): void
    {
        $response = $this->get('/urls?url_name=hogehogehogehogehogeohgehogehogeohgeohgehogeohgehoge');

        $response->assertStatus(302);
    }


    public function test_index_bad_medium_name(): void
    {
        $response = $this->get('/urls?medium_name=hogehogehogehogehogeohgehogehogeohgeohgehogeohgehoge');

        $response->assertStatus(302);
    }

    public function test_index_bad_medium_dtl_name(): void
    {
        $response = $this->get('/urls?medium_DTL_name=hogehogehogehogehogeohgehogehogeohgeohgehogeohgehoge');

        $response->assertStatus(302);
    }
}
