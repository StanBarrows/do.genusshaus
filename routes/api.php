<?php

Route::get('/v1/places', 'Controllers\Ressources\Places\PlacesController@index');
Route::get('/v1/tags', 'Controllers\Ressources\Places\TagsController@index');
