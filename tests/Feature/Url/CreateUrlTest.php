<?php

namespace Tests\Feature\Url;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUrlTest extends TestCase
{

    private $id = "7bbc275b-b13b-433b-890e-e986b7c28977";

    public function test_index(): void
    {
        $this->withoutVite();

        $response = $this->get('/urls/create');

        $response->assertStatus(200);
    }

    public function test_handle(): void
    {
        $this->withoutVite();

        $response = $this->post(
            'urls/store',
            [
                'url_name' => 'hogehoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id,
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(200);
    }

    public function test_handle_bad_name(): void
    {
        $this->withoutVite();

        $response = $this->post(
            'urls/store',
            [
                'url_name' => 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge',
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
            'urls/store',
            [
                'url_name' => 'hogehoge',
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
            'urls/store',
            [
                'url_name' => 'hogehoge',
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
            'urls/store',
            [
                'url_name' => 'hogehoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id . 'hogehoge',
                'form_id' => $this->id,
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_bad_form_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            'urls/store',
            [
                'url_name' => 'hogehoge',
                'medium_id' => $this->id,
                'medium_dtl_id' => $this->id,
                'lp_id' => $this->id,
                'form_id' => $this->id . 'hogehoge',
            ],
        );

        $response->assertStatus(302);
    }
}
