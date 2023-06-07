<?php

namespace Tests\Feature\Medium;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use illuminate\Support\Str;
use Tests\TestCase;

class AddMediumInfoTest extends TestCase
{
    use RefreshDatabase;

    public function testShowMediumAdd(): void
    {
        $this->withoutVite();

        $response = $this->get('/medium/add');

        $response->assertStatus(200);
    }

    public function testAddMedium(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/medium/add',
            [
                'medium_name' => 'hoge fuga',
            ]
        );

        $response->assertStatus(200);
    }
}
