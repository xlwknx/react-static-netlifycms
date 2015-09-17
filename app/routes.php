<?php

Route::group(
    array(
        'before' => 'auth'
    ),
    function() {
        Route::match(['GET'], 'dashboard', [
            'uses' => 'DashboardController@index'
        ]);

        Route::match(['GET', 'POST'], 'dashboard/application/create', [
            'uses' => 'ApplicationController@create'
        ]);

        Route::match(['GET', 'POST'], 'dashboard/application/update/{uuid}', [
            'uses' => 'ApplicationController@update'
        ]);
    }
);

Route::match(['GET', 'POST'], 'signin', [
    'uses' => 'AccountController@signin'
]);

Route::match(['GET', 'POST'], 'signup', [
    'uses' => 'AccountController@signup'
]);

Route::match(['GET', 'POST'], 'reset-password', [
    'uses' => 'AccountController@resetPassword'
]);

Route::match(['GET', 'POST'], 'update-password/{token}', [
    'uses' => 'AccountController@updatePassword'
]);

Route::get('signout', [
    'uses' => 'AccountController@signout'
]);


/*
|--------------------------------------------------------------------------
| Home routes
|--------------------------------------------------------------------------
*/
Route::get('/', [
    'uses' => 'HomeController@index'
]);


/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

Route::get('about-virgil', [
    'uses' => 'PublicController@aboutVirgil'
]);

Route::get('contact-us', [
    'uses' => 'PublicController@contactUs'
]);

Route::get('apps', [
    'uses' => 'PublicController@apps'
]);

Route::get('terms-of-service', [
    'uses' => 'PublicController@termsOfService'
]);

Route::get('privacy-policy', [
    'uses' => 'PublicController@privacyPolicy'
]);

Route::get('documents', [
    'uses' => 'DocumentsController@index'
]);

Route::get('documents/{language}/{reference}', [
    'uses' => 'DocumentsController@reference'
]);
