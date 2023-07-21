<?php

namespace Tests\Feature\Form;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditFormTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $this->withoutVite();

        $response = $this->get('/forms/7bbc275b-b13b-433b-890e-e986b7c28977/edit');

        $response->assertStatus(200);
    }

    public function test_handle(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/forms/7bbc275b-b13b-433b-890e-e986b7c28977/update',
            [
                'form_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'form_name' => 'hogehoge2',
                'form_directory' => 'hogehoge3',
                'form_memo' => null,
            ],
        );

        $response->assertStatus(200);
    }

    public function test_handle_bad_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/forms/7bbc275b-b13b-433b-890e-e986b7c28978/update',
            [
                'form_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'form_name' => 'hogehoge2',
                'form_directory' => 'hogehoge3',
                'form_memo' => null,
            ],
        );

        $response->assertStatus(500);
    }

    public function test_handle_long_id(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/forms/7bbc275b-b13b-433b-890e-e986b7c289777/update',
            [
                'form_id' => '7bbc275b-b13b-433b-890e-e986b7c289777',
                'form_name' => 'hogehoge2',
                'form_directory' => 'hogehoge3',
                'form_memo' => null,
            ],
        );

        $response->assertStatus(500);
    }

    public function test_handle_long_name(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/forms/7bbc275b-b13b-433b-890e-e986b7c28977/update',
            [
                'form_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'form_name' => '123456789012345678901234567890123456789012345678901234567890',
                'form_directory' => 'hogehoge3',
                'form_memo' => null,
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_long_dir(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/forms/7bbc275b-b13b-433b-890e-e986b7c28977/update',
            [
                'form_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'form_name' => 'hogehoge2',
                'form_directory' => 'hogehogehoge',
                'form_memo' => null,
            ],
        );

        $response->assertStatus(302);
    }

    public function test_handle_log_memo(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/forms/7bbc275b-b13b-433b-890e-e986b7c28977/update',
            [
                'form_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'form_name' => 'hogehoge2',
                'form_directory' => 'hogehoge3',
                'form_memo' => '123456789012345678901234567890123456789012345678901234567890',
            ],
        );

        $response->assertStatus(302);
    }
}
