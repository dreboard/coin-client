<?php

// Coins
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/view/{id}', 'CategoryController@index')->name('view');

});
