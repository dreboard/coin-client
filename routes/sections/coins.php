<?php

// Coins
use App\Coin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Coin as CoinResource;
//Route::get('/coin/{id}', 'CoinController@index')->name('coin');
//Route::get('/coinYear', 'CoinController@coinsByYear')->name('coinYear');
Route::get('/coin', function () {
    return new CoinResource(Coin::find(1));
    //return new CoinResource(DB::table('coins')->find(3));

});

Route::group(['prefix' => 'coins', 'as' => 'coins.'], function () {
    Route::get('/view/{id}', 'CoinController@index')->name('view');
    Route::get('/year', 'CoinController@coinsByYear')->name('year');
    Route::get('/form', 'CoinController@add')->name('form');
    Route::get('/add/{id}', 'CoinController@add')->name('add');

    Route::get('/variety/{id}', 'CoinVarietyController@index')->name('variety');
});
