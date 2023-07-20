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
}
