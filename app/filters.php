<?php

Route::filter('auth', function()  {

    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            return Redirect::guest('signin');
        }
    }
});

use Virgil\Validator\Application as ApplicationValidator,
    Virgil\Validator\Token as TokenValidator;

Route::filter('application', function($route, $request)  {

    $uuid = $route->getParameter('uuid');
    $validator = Validator::make(
        ['uuid' => $uuid], ApplicationValidator::getApplicationUUIDValidatorRules()
    );

    if($validator->fails()) {
        return Redirect::to('/dashboard');
    }

    $application = Auth::user()->applications()->where(
        'uuid', '=', $uuid
    )->first();

    App::bind('getApplication', function($app) use ($application)  {
        return $application;
    });
});

Route::filter('token', function($route, $request)  {

    $token = $route->getParameter('token');
    $validator = Validator::make(
        ['token' => $token], TokenValidator::getTokenValidatorRules()
    );

    if($validator->fails()) {
        return Redirect::to('/dashboard');
    }

    $token = ApplicationToken::whereToken(
        $token
    )->first();

    if($token->application_id != App::make('getApplication')->id) {
        return Redirect::to('/dashboard');
    }

    App::bind('getToken', function($app) use ($token)  {
        return $token;
    });
});
