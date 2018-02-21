<?php

include 'app/auth.php';

Route::get('/', function () {
    return redirect()->route('users.dashboard.index');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::group(['prefix' => '/backend'], function () {

        include 'app/users.php';

        Route::group(['middleware' => ['user-is-active']], function () {
            include 'app/administrators.php';
            include 'app/moderators.php';
            include 'app/supporters.php';
        });
    });
});

Route::post('/supporters/impersonate/destroy', 'Controllers\Supporters\SupportersController@destroy')->name('supporters.impersonate.destroy');

Route::get('/webhooks/invitations/register', 'Controllers\Webhooks\InvitationsRegisterController@index')->name('invitiations.register');

Route::get('/webhooks/invitations/join', 'Controllers\Webhooks\InvitationsRegisterController@join')->name('invitiations.join');

Route::post('/webhooks/invitations/register/{user}', 'Controllers\Webhooks\InvitationsRegisterController@store')->name('invitiations.reset.password');
