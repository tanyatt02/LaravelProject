<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_available_admin_news_url()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }
	public function test_available_only_one_news()
	{
		$id = mt_rand(1,10);
		$response = $this->get('/news/' . $id);

		$response->assertStatus(200);
	}

    public function test_news_header_date()
	{

    $response = $this->get('/news');

    $str = now()->format('D, d M Y H:i:s \G\M\T');

    $response->assertHeader('Date', now()->format('D, d M Y H:i:s \G\M\T'));

    }

    public function test_admin_add_new()
	{

    $response = $this->get('/admin/news');

    
    $response->assertSee('Add new');

    }
}
