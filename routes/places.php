<?php

Route::group(['prefix' => '/place', 'middleware' => ['places'], 'namespace' => 'Controllers\Places', 'as' => 'places.'], function () {

    Route::group(['prefix' => '/information', 'namespace' => 'Information', 'as' => 'information.'], function () {
        Route::get('/', 'InformationController@index')->name('index');
        Route::patch('/update', 'InformationController@update')->name('update');
    });

    Route::group(['prefix' => '/locations', 'namespace' => 'Locations', 'as' => 'locations.'], function () {
        Route::get('/', 'LocationsController@index')->name('index');
    });

    Route::group(['prefix' => '/openings-hours', 'namespace' => 'OpeningHours', 'as' => 'openings.'], function () {
        Route::get('/', 'OpeningHoursController@index')->name('index');
        Route::post('/store', 'OpeningHoursController@store')->name('store');
        Route::delete('/delete/{openingHour}', 'OpeningHoursController@delete')->name('delete');
    });

    Route::group(['prefix' => '/contacts', 'namespace' => 'Contacts', 'as' => 'contacts.'], function () {
        Route::get('/', 'ContactsController@index')->name('index');
        Route::patch('/update', 'ContactsController@update')->name('update');
    });

    Route::group(['prefix' => '/medias', 'namespace' => 'Medias', 'as' => 'medias.'], function () {
        Route::get('/', 'MediasController@index')->name('index');
        Route::patch('/update', 'MediasController@update')->name('update');
    });

    Route::group(['prefix' => '/events', 'namespace' => 'Events', 'as' => 'events.'], function () {
        Route::get('/', 'EventsController@index')->name('index');
        Route::get('/push/{event}', 'EventsController@push')->name('push');

        Route::get('/push/send/{event}', 'PushEventsController@send')->name('send');

        Route::get('/create', 'EventsController@create')->name('create');
        Route::post('/store', 'EventsController@store')->name('store');

        Route::get('/edit/{event}', 'EventsController@edit')->name('edit');
        Route::patch('/update/{event}', 'EventsController@update')->name('update');

        Route::delete('/delete/{event}', 'EventsController@delete')->name('delete');

        Route::patch('/publish/{event}', 'EventsController@publish')->name('publish');
        Route::patch('/unpublish/{event}', 'EventsController@unpublish')->name('unpublish');
    });

    Route::group(['prefix' => '/posts', 'namespace' => 'Posts', 'as' => 'posts.'], function () {
        Route::get('/', 'PostsController@index')->name('index');
        Route::get('/create', 'PostsController@create')->name('create');
        Route::post('/store', 'PostsController@store')->name('store');

        Route::get('/edit/{post}', 'PostsController@edit')->name('edit');

        Route::patch('/update/{post}', 'PostsController@update')->name('update');

        Route::delete('/delete/{post}', 'PostsController@delete')->name('delete');

        Route::patch('/publish/{post}', 'PostsController@publish')->name('publish');
        Route::patch('/unpublish/{post}', 'PostsController@unpublish')->name('unpublish');
    });

    Route::group(['prefix' => '/settings', 'namespace' => 'Settings', 'as' => 'settings.'], function () {
        Route::get('/', 'SettingsController@index')->name('index');

        Route::patch('/unpublish', 'SettingsController@unpublish')->name('unpublish');
        Route::patch('/review', 'SettingsController@review')->name('review');
    });

    Route::get('/{place?}', 'Dashboard\DashboardController@index')->name('dashboard.index');
});
