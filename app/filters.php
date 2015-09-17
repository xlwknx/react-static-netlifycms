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

use Virgil\Validator\Application as ApplicationValidator;

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
