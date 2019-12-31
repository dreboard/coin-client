<?php

// Coins
use Illuminate\Support\Facades\Route;

//Route::get('/coin/{id}', 'CoinController@index')->name('coin');
//Route::get('/coinYear', 'CoinController@coinsByYear')->name('coinYear');

Route::group(['prefix' => 'coins', 'as' => 'coins.'], function () {
    Route::get('/view/{id}', 'CoinController@index')->name('view');
    Route::get('/year', 'CoinController@coinsByYear')->name('year');
    Route::get('/form', 'CoinController@add')->name('form');
    Route::get('/add/{id}', 'CoinController@add')->name('add');
});
