<?php

Route::group(['prefix' => '/supporters', 'namespace' => 'Controllers\Supporters', 'as' => 'supporters.'], function () {
    Route::get('/', 'SupportersController@index')->name('index');

    Route::post('/impersonate/start', 'SupportersController@store')->name('impersonate.store');
});
