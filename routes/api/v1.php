<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Controllers\Ressources\iOS'], function () {
    Route::get('/devices', 'DevicesController@index');
    Route::get('/device/register', 'DevicesController@register');

    Route::post('/pushtoken', 'PushTokensController@update');

    Route::get('/information', 'InformationController@index');

    Route::get('/beacon', 'BeaconsController@index');
    Route::post('/beacon', 'BeaconsController@show');

    Route::post('/search', 'SearchController@search');
    Route::post('/search/phrase', 'SearchController@log');

    Route::group(['namespace' => 'Places'], function () {
        Route::group(['prefix' => '/places'], function () {
            Route::get('/', 'PlacesController@index');
            Route::post('/show', 'PlacesController@show');
        });

        Route::group(['prefix' => '/articles'], function () {
            Route::get('/', 'PostsController@index');
            Route::post('/show', 'PostsController@show');
        });

        Route::group(['prefix' => '/events'], function () {
            Route::get('/', 'EventsController@index');
            Route::post('/show', 'EventsController@show');
        });

        Route::group(['prefix' => '/favourites'], function () {
            Route::post('/', 'FavouritesController@index');
            Route::post('/add', 'FavouritesController@add');
            Route::post('/remove', 'FavouritesController@remove');
        });
    });
});
