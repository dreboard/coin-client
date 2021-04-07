<?php


namespace App\Providers;


use App\Http\Controllers\HomeController;
use App\Models\Coins\Coin;
use App\Models\Index;
use App\Repositories\CoinRepository;
use App\Repositories\HomeRepository;
use Illuminate\Support\ServiceProvider;

class CoinServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

      /*  $this->app->singleton(CoinRepository::class, function(){
            return new Coin;
        });
        $this->app->singleton(HomeController::class, function(){
            return new HomeRepository(new Index);
        });
        $this->app->singleton(HomeRepository::class, function(){
            return new Index();
        });*/


    }
}
