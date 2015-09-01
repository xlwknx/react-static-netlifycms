<?php

use Authentication as AuthenticationModel;

Route::filter('sessionFilter', function($route, $request)
{
    $authToken = Cookie::get('auth_token');
    App::bind('getCurrentAccount', function($app) use ($authToken) {
        return AuthenticationModel::getAccountByAuthToken(
            $authToken
        )->account;
    });

    if($authToken && ($route->getUri() == 'signup' || $route->getUri() == 'signin')) {
        return Redirect::to('/dashboard');
    }

});
