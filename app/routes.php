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

        Route::group(
            array(
                'before' => 'application'
            ),
            function() {
                Route::match(['GET', 'POST'], 'dashboard/application/{uuid}/update', [
                    'uses' => 'ApplicationController@update'
                ]);

                Route::match(['GET', 'POST'], 'dashboard/application/{uuid}/create-token', [
                    'uses' => 'TokenController@createToken'
                ]);

                Route::group(
                    array(
                        'before' => 'token'
                    ),
                    function() {
                        Route::match(['GET', 'POST'], 'dashboard/application/{uuid}/token/{token}/change-active-state', [
                            'uses' => 'TokenController@changeActiveState'
                        ]);
                    }
                );
            }
        );
    }
);

Route::match(['GET', 'POST'], 'account/signin', [
    'uses' => 'AccountController@signin'
]);

Route::match(['GET', 'POST'], 'account/signup', [
    'uses' => 'AccountController@signup'
]);

Route::get('account/signout', [
    'uses' => 'AccountController@signout'
]);

Route::match(['GET', 'POST'], 'account/password/reset', [
    'uses' => 'AccountController@resetPassword'
]);

Route::match(['GET', 'POST'], 'account/password/update/{code}', [
    'uses' => 'AccountController@updatePassword'
]);

Route::post('token/validate', array(
    'uses' => 'TokenController@validate'
));

Route::post('application/validate-token', array(
    'uses' => 'TokenController@validate'
));


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
