<?php

Route::group(['prefix' => '/places/{place}', 'namespace' => 'Controllers\Places', 'as' => 'places.'], function () {

    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

});