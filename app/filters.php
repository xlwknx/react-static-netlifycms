<?php

use Authentication as AuthenticationModel,
    Virgil\Validator\Application as ApplicationValidator;

Route::filter('sessionFilter', function($route, $request)
{
    $authToken = Cookie::get('auth_token');
    if(!$authToken) {
        return Redirect::to('/');
    }

    App::bind('getCurrentAccount', function($app) use ($authToken) {
        return AuthenticationModel::getAccountByAuthToken(
            $authToken
        )->account;
    });

    if($authToken && ($route->getUri() == 'signup' || $route->getUri() == 'signin')) {
        return Redirect::to('/dashboard');
    }
});

Route::filter('applicationExistFilter', function($route, $request)
{
    $result = ApplicationValidator::validateExists(
        App::make('getCurrentAccount'),
        $route->getParameter('uuid')
    );

    if(!$result) {
        App::abort(404);
    }
});
