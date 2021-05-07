<?php


namespace Tests\Coin;
use App\Repositories\CoinRepository;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Tests\TestCase;

class CoinTest extends TestCase
{
    use InteractsWithViews;


    public function setUp(): void
    {
        parent::setUp();
        $this->coinRepository = new CoinRepository;
    }

    public function testIndexPage()
    {
        $response = $this->get('/coins/view/3664');
        $this->visit('/view')
            ->see('1909 P')
            ->seePageIs('/home');
        $this->assertTrue(true);
    }

    public function testBasicTest()
    {
        $this->get('coins/view/3664')
            ->assertStatus(302)
            ->assertLocation('/home');
    }

    public function testTypeRouteTest()
    {
        $this->get('category/view/10')
            ->assertStatus(302)
            ->assertLocation('/home');
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetCoin()
    {
        $response = $this->get('http://localhost/coins/coins-client/public/coins/view/4013');
        dd($response->getData());
        $response->assertStatus(200);
    }

    /**
     * Get coin by ID.
     *
     * @return void
     */
    public function testCoinRoute()
    {
        $response = $this->get('/coins/view/3664');
        $response->assertStatus(302);
    }

    /**
     * Get type by ID.
     *
     * @return void
     */
    public function testTypeRoute()
    {
        $response = $this->get('/type/view/2');
        $response->assertStatus(302);
    }
    /**
     * Get type by ID.
     *
     * @return void
     */
    public function testCategoryRoute()
    {
        $response = $this->get('/category/view/83');
        $response->assertStatus(302);
    }

}
