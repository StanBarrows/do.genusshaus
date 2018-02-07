<?php

include 'app/auth.php';

Route::get('/', function () {
    return redirect()->route('users.dashboard.index');
});


Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('places', 'Controllers\Places\Places\PlacesController@index')->name('places.index');
    Route::post('places/store', 'Controllers\Places\Places\PlacesController@store')->name('places.store');

    Route::get('posts', 'Controllers\Places\Posts\PostsController@index')->name('posts.index');
    Route::post('posts/store', 'Controllers\Places\Posts\PostsController@store')->name('posts.store');

    Route::get('events', 'Controllers\Places\Events\EventsController@index')->name('events.index');
    Route::post('events/store', 'Controllers\Places\Events\EventsController@store')->name('events.store');

    Route::group(['prefix' => '/backend'], function () {

        include 'app/users.php';
        include 'app/administrators.php';
        include 'app/moderators.php';
        include 'app/supporters.php';
    });


});