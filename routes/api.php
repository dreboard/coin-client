<?php

use App\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Resources\Coin as CoinResource;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'coin', 'as' => 'coin.'], function () {

    Route::get('/get/{id}', function ($id) {
        return new CoinResource(Coin::find($id));
        //return new CoinResource(DB::table('coins')->find(3));
    });
});
Route::group(['prefix' => 'type', 'as' => 'type.'], function () {

    Route::get('/get/{id}', function ($id) {
        return new CoinResource(Coin::find($id));
        //return new CoinResource(DB::table('coins')->find(3));
    });
});
Route::post('/getCats', 'CoinHomeController@getCats')->name('home');
