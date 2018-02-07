<?php

Route::group(['prefix' => '/administrators', 'namespace' => 'Controllers\Administrators', 'as' => 'administrators.'], function () {
    Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => '/regions', 'namespace' => 'Regions', 'as' => 'regions.'], function () {
        Route::get('/', 'RegionsController@index')->name('index');
        Route::get('/create', 'RegionsController@create')->name('create');
        Route::post('/create', 'RegionsController@store')->name('store');
    });

    Route::group(['prefix' => '/users', 'namespace' => 'Users', 'as' => 'users.'], function () {
        Route::get('/', 'UsersController@index')->name('index');
        Route::get('/create', 'UsersController@create')->name('create');
        Route::post('/create', 'UsersController@store')->name('store');
    });
});
