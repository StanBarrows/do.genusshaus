<?php

Route::group(['prefix' => '/moderators', 'namespace' => 'Controllers\Moderators\Dashboard', 'as' => 'moderators.'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
});
