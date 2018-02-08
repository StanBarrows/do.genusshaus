<?php

Route::group(['middleware' => ['place-is-active']], function () {
    Route::group(['prefix' => '/places/{place}', 'namespace' => 'Controllers\Places', 'as' => 'places.'], function () {
        Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

        Route::group(['prefix' => '/place', 'namespace' => 'Place', 'as' => 'place.'], function () {
            Route::get('/', 'PlaceController@index')->name('index');
        });

        Route::group(['prefix' => '/events', 'namespace' => 'Events', 'as' => 'events.'], function () {
            Route::get('/', 'EventsController@index')->name('index');
        });

        Route::group(['prefix' => '/posts', 'namespace' => 'Posts', 'as' => 'posts.'], function () {
            Route::get('/', 'PostsController@index')->name('index');
        });

        Route::group(['prefix' => '/settings', 'namespace' => 'Settings', 'as' => 'settings.'], function () {
            Route::get('/', 'SettingsController@index')->name('index');
        });
    });
});
