<?php

// Coins
use App\Coin;
use App\Http\Controllers\CoinController;
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
    Route::get('/view/{id}', 'CoinController@coinID')->name('view');
    Route::get('/year', 'CoinController@coinsByYear')->name('year');
    Route::get('/form', 'CoinController@add')->name('form');
    Route::get('/add/{id}', 'CoinController@add')->name('add');

    Route::get('/variety_by_id/{id}', 'CoinVarietyController@viewByID')->name('variety_by_id');
    Route::get('/variety/{id}', 'CoinVarietyController@index')->name('variety');
    Route::get('/varietyType/{variety}/{id}', 'CoinVarietyController@byType')->name('varietyType');


    Route::get('/grade/{id}', [CoinController::class, 'gradesByID'])->name('grade');

});
