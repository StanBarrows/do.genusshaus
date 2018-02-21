<?php

include 'api/v1.php';

    Route::group(['prefix' => '/v1/landingpage'], function () {
        Route::get('/places', 'Controllers\Ressources\Landingpage\PlacesController@index');
        Route::get('/places/show/{place}', 'Controllers\Ressources\Landingpage\PlacesController@show');

        Route::get('/places/recommendations/{place}', 'Controllers\Ressources\Landingpage\PlacesController@recommendations');
    });
