<?php

Route::group(['prefix' => '/users', 'namespace' => 'Controllers\Users', 'as' => 'users.'], function () {
    Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => '/profile', 'namespace' => 'Profile', 'as' => 'profile.'], function () {
        Route::get('/', 'ProfileController@index')->name('index');
        Route::patch('/', 'ProfileController@update')->name('update');

        Route::get('/password', 'PasswordController@index')->name('password.index');
        Route::patch('/password', 'PasswordController@update')->name('password.update');
    });

    Route::group(['prefix' => '/support', 'namespace' => 'Support', 'as' => 'support.'], function () {
        Route::get('/', 'SupportController@index')->name('index');
        Route::post('/store', 'SupportController@store')->name('store');
    });
});
