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

        Route::get('signin', array(
            'uses' => 'SessionController@signin'
        ));

        Route::get('signup', array(
            'uses' => 'SessionController@signup'
        ));
    }
);

Route::get('dashboard', array(
    'uses' => 'DashboardController@index'
));

Route::post('signin', array(
    'uses' => 'SessionController@signin'
));

Route::post('signup', array(
    'uses' => 'SessionController@signup'
));

Route::get('signout', array(
    'uses' => 'SessionController@signout'
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

Route::get('about-us', array(
    'uses' => 'PublicController@aboutUs'
));

Route::get('contact-us', array(
    'uses' => 'PublicController@contactUs'
));

Route::get('apps', array(
    'uses' => 'PublicController@apps'
));

Route::get('reset', array(
    'uses' => 'PublicController@reset'
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
