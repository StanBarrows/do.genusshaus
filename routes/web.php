<?php


Route::get('/', function () {

    return view('welcome');

});


Route::group(['namespace' => 'Controllers\Auth'], function () {

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});

Route::get('dashboard', 'Controllers\Users\DashboardController@index')->name('dashboard.index');

Route::get('events', 'Controllers\Places\Events\StoreEventsController@index')->name('events.index');
Route::post('events/store', 'Controllers\Places\Events\StoreEventsController@store')->name('events.store');

Route::get('places', 'Controllers\Places\Places\StorePlacesController@index')->name('places.index');
Route::post('places/store', 'Controllers\Places\Places\StorePlacesController@store')->name('places.store');


