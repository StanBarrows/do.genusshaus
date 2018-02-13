<?php

Route::get('/v1/places', 'Controllers\Ressources\Places\PlacesController@index');
Route::get('/v1/tags', 'Controllers\Ressources\Places\TagsController@index');

    Route::group(['prefix' => '/v1/landingpage'], function ()
    {
        Route::get('/places', 'Controllers\Ressources\Landingpage\PlacesController@index');
        Route::get('/places/show/{place}', 'Controllers\Ressources\Landingpage\PlacesController@show');

        Route::get('/places/recommendations/{place}', 'Controllers\Ressources\Landingpage\PlacesController@recommendations');

    });




