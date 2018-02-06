<?php


Route::get('/', function () {

    return view('welcome');

});

Route::group(['namespace' => 'Controllers\Auth'], function () {

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');

/*    Route::post('register', 'RegisterController@register');*/

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});

Route::get('dashboard', 'Controllers\Users\Dashboard\DashboardController@index')->name('dashboard.index');
Route::get('support', 'Controllers\Users\Dashboard\DashboardController@index')->name('support.index');


Route::get('posts', 'Controllers\Places\Posts\PostsController@index')->name('posts.index');

Route::get('events', 'Controllers\Places\Events\EventsController@index')->name('events.index');
Route::post('events/store', 'Controllers\Places\Events\EventsController@store')->name('events.store');

Route::get('places', 'Controllers\Places\Places\PlacesController@index')->name('places.index');
Route::post('places/store', 'Controllers\Places\Places\PlacesController@store')->name('places.store');


Route::get('administrators/dashboard', 'Controllers\Administrators\Dashboard\DashboardController@index')->name('administrators.dashboard.index');
Route::get('moderators/dashboard', 'Controllers\Moderators\Dashboard\DashboardController@index')->name('moderators.dashboard.index');

Route::get('supporters', 'Controllers\Supporters\SupportersController@index')->name('supporters.index');

Route::post('/impersonate/start', 'Controllers\Supporters\SupportersController@store')->name('impersonate.store');
Route::post('/impersonate/destroy', 'Controllers\Supporters\SupportersController@destroy')->name('impersonate.destroy');



