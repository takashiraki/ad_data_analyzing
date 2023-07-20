<?php

namespace Tests\Feature\Form;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateFormtest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->withVite();

        $response = $this->get('/forms/create');

        $response->assertStatus(200);
    }

    public function test_create_form(): void
    {
        $this->withVite();

        $response = $this->post(
            '/forms/store',
            [
                'form_name' => 'hogehoge',
                'form_directory' => 'hoge01',
                'form_memo' => null,
            ]
        );

        $response->assertStatus(200);
    }
}
