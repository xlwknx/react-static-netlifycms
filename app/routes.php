<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(
    array(
        'before' => 'sessionFilter'
    ),
    function() {

        Route::get('dashboard', array(
            'uses' => 'DashboardController@index'
        ));

        Route::get('dashboard/application/create', array(
            'uses' => 'DashboardController@createApplication'
        ));

        Route::post('dashboard/application/create', array(
            'uses' => 'DashboardController@createApplication'
        ));

        Route::group(
            array(
                'before' => 'applicationExistFilter'
            ),
            function() {

                Route::get('dashboard/application/update/{uuid}', array(
                    'uses' => 'DashboardController@updateApplication'
                ));

                Route::post('dashboard/application/update/{uuid}', array(
                    'uses' => 'DashboardController@updateApplication'
                ));

                Route::post('dashboard/application/delete/{uuid}', array(
                    'uses' => 'DashboardController@deleteApplication'
                ));
            }
        );
    }
);

Route::get('signin', array(
    'uses' => 'AccountController@signin'
));

Route::post('signin', array(
    'uses' => 'AccountController@signin'
));



Route::get('signup', array(
    'uses' => 'AccountController@signup'
));

Route::post('signup', array(
    'uses' => 'AccountController@signup'
));



Route::get('signout', array(
    'uses' => 'AccountController@signout'
));


Route::get('reset-password', array(
    'uses' => 'AccountController@resetPassword'
));

Route::post('reset-password', array(
    'uses' => 'AccountController@resetPassword'
));

Route::get('update-password/{token}', array(
    'uses' => 'AccountController@updatePassword'
));



Route::post('application/validate-token', array(
    'uses' => 'ApplicationController@validateToken'
));

/*
|--------------------------------------------------------------------------
| Home routes
|--------------------------------------------------------------------------
*/
Route::get('/', array(
    'uses' => 'HomeController@index'
));


/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

Route::get('about-virgil', array(
    'uses' => 'PublicController@aboutVirgil'
));

Route::get('contact-us', array(
    'uses' => 'PublicController@contactUs'
));

Route::get('apps', array(
    'uses' => 'PublicController@apps'
));

Route::get('terms-of-service', array(
    'uses' => 'PublicController@termsOfService'
));

Route::get('privacy-policy', array(
    'uses' => 'PublicController@privacyPolicy'
));

Route::get('documents', array(
    'uses' => 'DocumentsController@index'
));

Route::get('documents/{language}/{reference}', array(
    'uses' => 'DocumentsController@reference'
));
