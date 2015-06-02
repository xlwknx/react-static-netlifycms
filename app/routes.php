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

Route::post('account/signin', array(
    'uses' => 'AccountController@signin'
));

Route::get('account/signout', array(
    'uses' => 'AccountController@signout'
));

Route::post('account/signup', array(
    'uses' => 'AccountController@signup'
));

Route::get('account/type-list', array(
    'uses' => 'AccountController@typeList'
));

Route::get('account/confirm/{code}', array(
    'uses' => 'AccountController@confirm'
));

Route::post('account/confirm/re-send', array(
    'uses' => 'AccountController@resendConfirm'
));


Route::post('application/validate-token', array(
    'uses' => 'ApplicationController@validateToken'
));


/*
|--------------------------------------------------------------------------
| Application Route Filters
|--------------------------------------------------------------------------
|
| Apply Auth verification for some protected methods.
|
*/
Route::group(array('before' => 'authVerification'), function () {

    Route::get('application/get/{application}', array(
        'uses' => 'ApplicationController@getOne'
    ));

    Route::get('application/list', array(
        'uses' => 'ApplicationController@getAll'
    ));

    Route::post('application/reset-key/{application}', array(
        'uses' => 'ApplicationController@resetKey'
    ));

    Route::post('application', array(
        'uses' => 'ApplicationController@create'
    ));

    Route::put('application/{application}', array(
        'uses' => 'ApplicationController@update'
    ));

    Route::delete('application/{application}', array(
        'uses' => 'ApplicationController@delete'
    ));
});

/*
|--------------------------------------------------------------------------
| Frontend routes
|--------------------------------------------------------------------------
*/

Route::get('/', array(
    'uses' => 'HomeController@index'
));

Route::get('about-us', array(
    'uses' => 'PublicController@aboutUs'
));

Route::get('contact-us', array(
    'uses' => 'PublicController@contactUs'
));

Route::get('downloads', array(
    'uses' => 'PublicController@downloads'
));

Route::get('documents', array(
    'uses' => 'PublicController@documents'
));

Route::get('signin', array(
    'uses' => 'PublicController@signin'
));

Route::get('signup', array(
    'uses' => 'PublicController@signup'
));
Route::get('reset', array(
    'uses' => 'PublicController@reset'
));

Route::get('dashboard', array(
    'uses' => 'DashboardController@index'
));

Route::get('apps/{application}', array(
    'uses' => 'DashboardController@index'
));
