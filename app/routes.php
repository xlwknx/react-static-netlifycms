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

Route::post('account/signout', array(
    'uses' => 'AccountController@signout'
));

Route::post('account/signup', array(
    'uses' => 'AccountController@signup'
));

Route::get('account/type-list', array(
    'uses' => 'AccountController@typeList'
));


Route::post('application/validate-key', array(
    'uses' => 'ApplicationController@validateKey'
));



/*
|--------------------------------------------------------------------------
| Application Route Filters
|--------------------------------------------------------------------------
|
| Apply Auth verification for some protected methods.
|
*/
Route::group(array('before' => 'authVerification'), function()
{

    Route::get('application/get/{application}', array(
        'uses' => 'ApplicationController@getOne'
    ));

    Route::get('application/list', array(
        'uses' => 'ApplicationController@getAll'
    ));

    Route::get('application/reset-key/{application}', array(
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
