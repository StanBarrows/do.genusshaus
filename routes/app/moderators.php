<?php

Route::group(['prefix' => '/moderators', 'namespace' => 'Controllers\Moderators', 'as' => 'moderators.'], function () {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => '/places', 'namespace' => 'Places', 'as' => 'places.'], function () {
        Route::get('/', 'PlacesController@index')->name('index');
        Route::get('/create', 'PlacesController@create')->name('create');
        Route::post('/store', 'PlacesController@store')->name('store');

        Route::group(['prefix' => '/{place}'], function () {
            Route::group(['prefix' => '/dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.'], function () {
                Route::get('/', 'DashboardController@index')->name('index');
            });

            Route::group(['prefix' => '/information', 'namespace' => 'Information', 'as' => 'information.'], function () {
                Route::get('/', 'InformationController@index')->name('index');
            });

            Route::group(['prefix' => '/location', 'namespace' => 'Location', 'as' => 'location.'], function () {
                Route::get('/', 'LocationController@index')->name('index');
                Route::patch('/', 'LocationController@update')->name('update');
            });

            Route::group(['prefix' => '/users', 'namespace' => 'NewPlacesShowRessource', 'as' => 'users.'], function () {
                Route::get('/', 'UsersController@index')->name('index');
                Route::get('/invite', 'UsersController@invite')->name('invite');
                Route::post('/invite/store', 'UsersController@store')->name('invite.store');

                Route::patch('/assign', 'UsersController@assign')->name('assign');
            });

            Route::group(['prefix' => '/categories', 'namespace' => 'Categories', 'as' => 'categories.'], function () {
                Route::get('/', 'CategoriesController@index')->name('index');
            });

            Route::group(['prefix' => '/tags', 'namespace' => 'Tags', 'as' => 'tags.'], function () {
                Route::get('/', 'TagsController@index')->name('index');
                Route::patch('/', 'TagsController@update')->name('update');
            });

            Route::group(['prefix' => '/setting', 'namespace' => 'Settings', 'as' => 'settings.'], function () {
                Route::get('/', 'SettingsController@index')->name('index');

                Route::patch('/activate', 'SettingsController@activate')->name('activate');
                Route::patch('/deactivate', 'SettingsController@deactivate')->name('deactivate');

                Route::patch('/publish', 'SettingsController@publish')->name('publish');
                Route::patch('/unpublish', 'SettingsController@unpublish')->name('unpublish');

                Route::delete('/delete', 'SettingsController@delete')->name('delete');

                Route::patch('/type', 'SettingsController@type')->name('type');
            });

            Route::group(['prefix' => '/beacons', 'namespace' => 'Beacons', 'as' => 'beacons.'], function () {
                Route::get('/', 'BeaconsController@index')->name('index');
                Route::get('/create', 'BeaconsController@create')->name('create');
                Route::post('/store', 'BeaconsController@store')->name('store');
                Route::delete('/delete/{beacon}', 'BeaconsController@delete')->name('delete');
            });
        });
    });

    Route::group(['prefix' => '/regions', 'namespace' => 'Regions', 'as' => 'regions.'], function () {
        Route::get('/', 'RegionsController@index')->name('index');
        Route::get('/create', 'RegionsController@create')->name('create');
        Route::post('/store', 'RegionsController@store')->name('store');
    });

    Route::group(['prefix' => '/countries', 'namespace' => 'Countries', 'as' => 'countries.'], function () {
        Route::get('/', 'CountriesController@index')->name('index');
        Route::get('/create', 'CountriesController@create')->name('create');
        Route::post('/store', 'CountriesController@store')->name('store');
    });
});
