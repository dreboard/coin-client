<?php


namespace Tests\Coin;
use Tests\TestCase;

class CoinTest extends TestCase
{

    public function testBasicTest()
    {
        $response = $this->get('/view');
        $this->visit('/home')
            ->see('Welcome')
            ->seePageIs('/home');
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetCoin()
    {
        $response = $this->get('http://localhost/coins/coins-client/public/coins/view/4013');
        dd($response);
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest2()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
