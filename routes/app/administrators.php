<?php

Route::group(['prefix' => '/administrators', 'namespace' => 'Controllers\Administrators\Dashboard', 'as' => 'administrators.'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
});
