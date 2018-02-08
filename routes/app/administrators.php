<?php

Route::group(['prefix' => '/administrators', 'namespace' => 'Controllers\Administrators', 'as' => 'administrators.'], function () {
    Route::get('dashboard', 'Dashboard\DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => '/users', 'namespace' => 'Users', 'as' => 'users.'], function () {
        Route::get('/', 'UsersController@index')->name('index');

        Route::get('/create', 'UsersController@create')->name('create');
        Route::post('/store', 'UsersController@store')->name('store');

        Route::get('/edit/{user}', 'UsersController@edit')->name('edit');
        Route::patch('/update/{user}', 'UsersController@update')->name('update');

        Route::patch('/activate/{user}', 'UsersController@activate')->name('activate');
        Route::patch('/deactivate/{user}', 'UsersController@deactivate')->name('deactivate');

        Route::delete('/delete/{user}', 'UsersController@delete')->name('delete');
    });

    Route::group(['prefix' => '/regions', 'namespace' => 'Regions', 'as' => 'regions.'], function () {
        Route::get('/', 'RegionsController@index')->name('index');
        Route::get('/create', 'RegionsController@create')->name('create');
        Route::post('/store', 'RegionsController@store')->name('store');
    });

    Route::group(['prefix' => '/countries', 'namespace' => 'Countries', 'as' => 'countries.'], function () {
        Route::get('/', 'CountriesController@index')->name('index');
        Route::get('/create', 'CountriesController@create')->name('create');
        Route::post('/store', 'CountriesController@store')->name('store');
    });
});
