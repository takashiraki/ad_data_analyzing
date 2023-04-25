<?php

namespace Tests\Feature\Medium;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use illuminate\Support\Str;
use Tests\TestCase;

class AddMediumInfoTest extends TestCase
{
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
                'medium_id' => (string)Str::uuid(),
                'medium_name' => 'hoge fuga',
                'add_medium_day' => now(),
                'last_medium_edit_day' => now(),
            ]
        );

        $response->assertStatus(200);
    }
}
