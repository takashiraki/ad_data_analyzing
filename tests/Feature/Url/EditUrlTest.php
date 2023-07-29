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
}
