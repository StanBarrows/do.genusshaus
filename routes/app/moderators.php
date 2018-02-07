<?php

Route::group(['prefix' => '/moderators', 'namespace' => 'Controllers\Moderators', 'as' => 'moderators.'], function () {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => '/invitations', 'namespace' => 'Invitations', 'as' => 'invitations.'], function () {
        Route::get('/', 'InvitationsController@index')->name('index');
        Route::get('/create', 'InvitationsController@create')->name('create');
        Route::post('/create', 'InvitationsController@store')->name('store');
    });

    Route::group(['prefix' => '/places', 'namespace' => 'Places', 'as' => 'places.'], function () {
        Route::get('/', 'PlacesController@index')->name('index');
        Route::get('/create', 'PlacesController@create')->name('create');
        Route::post('/create', 'PlacesController@store')->name('store');
    });

    Route::group(['prefix' => '/beacons', 'namespace' => 'Beacons', 'as' => 'beacons.'], function () {
        Route::get('/', 'BeaconsController@index')->name('index');
        Route::get('/create', 'BeaconsController@create')->name('create');
        Route::post('/create', 'BeaconsController@store')->name('store');
    });
});
