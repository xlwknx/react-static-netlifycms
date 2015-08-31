<?php

use Authentication as AuthenticationModel;

Route::filter('sessionFilter', function($route, $request)
{
    if(Cookie::get('auth_token')) {
        return Redirect::to('/dashboard');
    }
});

Route::filter('accountFilter', function($route, $request)
{
    $authToken = Cookie::get('auth_token');
    App::bind('getCurrentAccount', function($app) use ($authToken) {
        return AuthenticationModel::getAccountByAuthToken(
            $authToken
        )->account;
    });
});
