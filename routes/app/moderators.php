<?php

Route::group(['prefix' => '/moderators', 'namespace' => 'Controllers\Moderators', 'as' => 'moderators.'], function () {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => '/invitations', 'namespace' => 'Invitations', 'as' => 'invitations.'], function () {
        Route::get('/', 'InvitationsController@index')->name('index');
        Route::get('/create', 'InvitationsController@create')->name('create');
        Route::post('/store', 'InvitationsController@store')->name('store');
    });

    Route::group(['prefix' => '/places', 'namespace' => 'Places', 'as' => 'places.'], function () {
        Route::get('/', 'PlacesController@index')->name('index');

        Route::get('/create', 'PlacesController@create')->name('create');

        Route::group(['prefix' => '/place'], function () {
        });

        Route::group(['prefix' => '/metas'], function () {
        });

        Route::group(['prefix' => '/setting'], function () {
        });

        Route::post('/store', 'PlacesController@store')->name('store');

        Route::get('/edit/{place}', 'PlacesController@edit')->name('edit');
        Route::patch('/update/{place}', 'PlacesController@update')->name('update');

        Route::patch('/activate/{place}', 'PlacesController@activate')->name('activate');
        Route::patch('/deactivate/{place}', 'PlacesController@deactivate')->name('deactivate');

        Route::patch('/assign/{place}', 'PlacesController@assign')->name('assign');
        Route::patch('/unassign/{place}', 'PlacesController@unassign')->name('unassign');

        Route::patch('/publish/{place}', 'PlacesController@publish')->name('publish');
        Route::patch('/unpublish/{place}', 'PlacesController@unpublish')->name('unpublish');

        Route::patch('/reset/{place}', 'PlacesController@reset')->name('reset');

        Route::delete('/delete/{place}', 'PlacesController@delete')->name('delete');
    });

    Route::group(['prefix' => '/beacons', 'namespace' => 'Beacons', 'as' => 'beacons.'], function () {
        Route::get('/', 'BeaconsController@index')->name('index');
        Route::get('/create', 'BeaconsController@create')->name('create');
        Route::post('/store', 'BeaconsController@store')->name('store');
    });
});
