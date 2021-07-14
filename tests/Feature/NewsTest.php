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
    public function test_news()
    {
        $response = $this->get('api/news');

        $response->assertStatus(200);
    }

    public function test_return_data()
    {
        $response = $this->get('api/news');

        $this->assertArrayHasKey('data', $response->json());
    }

    public function test_first_item_sort()
    {
        $response = $this->get('api/news');

        $this->assertEquals(
            'Microsoft vai lançar versão do Windows em nuvem para empresas',
            $response->json()['data'][0]['title']
        );
    }

    public function test_last_item_sort()
    {
        $response = $this->get('api/news');

        $this->assertEquals(
            'Câmara aprova projeto que regulamenta \'supersalários\' no serviço público',
            $response->json()['data'][39]['title']
        );
    }
}
