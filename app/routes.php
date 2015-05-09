<?php

//'before' => 'auth'
Route::group(['before' => 'auth'], function(){

    Route::get('',
            [
                'as' => 'index.dashboard',
                'uses' => 'IndexController@dashboard'
            ]);
    Route::get('about',
            [
                'as' => 'index.about',
                'uses' => 'IndexController@about'
            ]);
    Route::get('profile',
            [
                'as' => 'index.profile',
                'uses' => 'IndexController@profile'
            ]);

    // #############################################
    // share Management
    // #############################################
//     Route::resource('nerds', 'NerdsController');
    Route::resource('nerds', 'NerdsController', [
        'except' => [ 'store', 'update', 'destroy']
    ]);

    Route::group(['before' => 'csrf'], function(){
        Route::resource('nerds', 'NerdsController',
                ['only' => ['store', 'update', 'destroy',]]);
    });


    // Confide routes
    Route::get('users/create', [
        'as' => 'users.create',
        'uses' => 'UsersController@create'
    ]);
    Route::get('users/logout', [
        'as' => 'users.logout',
        'uses' => 'UsersController@logout'
    ]);
    Route::post('users', [
        'as' => 'users.store',
        'uses' => 'UsersController@store'
    ]);
    Route::get('users', [
        'as' => 'users.index',
        'uses' => 'UsersController@index'
    ]);

    Route::delete('users/{user}', [
        'as' => 'users.destroy',
        'uses' => 'UsersController@destroy'
    ]);
});
//
Route::get('/', 'HomeController@showWelcome');
Route::get('/qrcode', function(){

    Qrcode::render('dfdfdfdfdf');
});
Route::get('users/login',                   'UsersController@login');
Route::post('users/login',                  'UsersController@doLogin');
Route::get('users/confirm/{code}',          'UsersController@confirm');
Route::get('users/forgot_password',         'UsersController@forgotPassword');
Route::post('users/forgot_password',        'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}',  'UsersController@resetPassword');
Route::post('users/reset_password',         'UsersController@doResetPassword');

// Route::get('users/create',  'UsersController@create');
// Route::post('users',        'UsersController@store');