<?php

namespace Tests\Feature\Url;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteUrlTest extends TestCase
{

    /**
     * test url id
     *
     * @var string
     */
    private $url_id = 'hogehogehogehogehogehogehogehogeohge';



    /**
     * index test
     *
     * @return void
     */
    public function test_index(): void
    {
        $response = $this->get('/urls/' . $this->url_id . '/delete');

        $response->assertStatus(200);
    }



    /**
     * bad url
     *
     * @return void
     */
    public function test_index_bad_url(): void
    {
        $response = $this->get('/urls/' . $this->url_id . 'hoge/delete');

        $response->assertStatus(302);
    }


    /**
     * handle test
     *
     * @return void
     */
    public function test_handle(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->url_id . '/delete',
            [
                'url_id' => $this->url_id,
            ]
        );

        $response->assertStatus(200);
    }


    /**
     * handle test bad url
     *
     * @return void
     */
    public function test_handle_bad_url(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->url_id . 'hogehoge/delete',
            [
                'url_id' => $this->url_id,
            ]
        );

        $response->assertStatus(302);
    }


    /**
     * handle test bad hidden parameter
     *
     * @return void
     */
    public function test_handle_bad_parameter(): void
    {
        $this->withoutVite();

        $response = $this->post(
            '/urls/' . $this->url_id . '/delete',
            [
                'url_id' => $this->url_id . 'hogehoge',
            ]
        );

        $response->assertStatus(302);
    }
}
