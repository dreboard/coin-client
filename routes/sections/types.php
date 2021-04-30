<?php

// Coins
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'type', 'as' => 'type.'], function () {
    Route::get('/view/{id}', 'TypeController@index')->name('view');

});
