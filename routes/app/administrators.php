<?php

Route::group(['prefix' => '/administrators', 'namespace' => 'Controllers\Administrators', 'as' => 'administrators.'], function () {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => '/users', 'namespace' => 'Users', 'as' => 'users.'], function () {
        Route::get('/', 'UsersController@index')->name('index');

        Route::get('/create', 'UsersController@create')->name('create');
        Route::post('/store', 'UsersController@store')->name('store');

        Route::get('/edit/{user}', 'UsersController@edit')->name('edit');
        Route::patch('/update/{user}', 'UsersController@update')->name('update');

        Route::delete('/delete/{user}', 'UsersController@delete')->name('delete');
    });

    Route::group(['prefix' => '/recommendations', 'namespace' => 'Recommendations', 'as' => 'recommendations.'], function () {
        Route::get('/', 'RecommendationsController@index')->name('index');
    });

    Route::group(['prefix' => '/logs', 'namespace' => 'Logs', 'as' => 'logs.'], function () {
        Route::get('/', 'ServicesController@index')->name('index');
    });
});
