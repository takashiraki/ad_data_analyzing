<?php

namespace Tests\Feature\Url;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditUrlTest extends TestCase
{
    private $id = '7bbc275b-b13b-433b-890e-e986b7c28977';

    /**
     * A index test.
     */
    public function test_index(): void
    {
        $this->withoutVite();

        $response = $this->get('/urls/' . $this->id . '/edit');

        $response->assertStatus(200);
    }



    /**
     * A bad index test.
     */
    public function test_index_bad_id(): void
    {
        $this->withoutVite();

        $response = $this->get('/urls/' . $this->id . 'hoge/edit');

        $response->assertStatus(500);
    }

    public function test_handle(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->id . '/update',
            [
                'url_id' => $this->id,
                'url_name' => 'hoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id,
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(200);
    }

    public function test_handle_bad_url(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->id . 'hogehoge/update',
            [
                'url_id' => $this->id,
                'url_name' => 'hoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id,
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(500);
    }

    public function test_handle_url_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->id . '/update',
            [
                'url_id' => $this->id . 'hogehoge',
                'url_name' => 'hoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id,
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_url_name(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->id . '/update',
            [
                'url_id' => $this->id,
                'url_name' => 'hogehogehogehogehogehogehogehogehogehogehogehogehoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id,
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_medium_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->id . '/update',
            [
                'url_id' => $this->id,
                'url_name' => 'hoge',
                'medium_id' => $this->id . 'hogehoge',
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id,
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_medium_dtl_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->id . '/update',
            [
                'url_id' => $this->id,
                'url_name' => 'hoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id . 'hogehoge',
                'lp_id' => $this->id,
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_lp_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->id . '/update',
            [
                'url_id' => $this->id,
                'url_name' => 'hoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id . 'hoge',
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_form_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->id . '/update',
            [
                'url_id' => $this->id,
                'url_name' => 'hoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id,
                'form_id' => $this->id . 'hoge',
            ],
        );

        $response->assertStatus(302);
    }
}
