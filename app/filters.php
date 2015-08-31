<?php

Route::filter('sessionFilter', function($route, $request)
{
    if(Cookie::get('auth_token')) {
        return Redirect::to('/dashboard');
    }
});
