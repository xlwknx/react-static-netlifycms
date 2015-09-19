<?php

use Symfony\Component\HttpFoundation\Response as HttpResponse;

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

Log::useFiles(
    storage_path().'/logs/laravel.log'
);

App::error(function(Exception $exception, $code)
{
    if($exception instanceof \Virgil\Exception\Validator) {
        return Response::json(array(
            'error' => array(
                'code' => $exception->getCode()
            )
        ), HttpResponse::HTTP_BAD_REQUEST);
    }

    // Catch Method Not Allowed Exception
    if($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {

        Log::error(
            'NotAllowedHttpException Route: ' . Request::url()
        );

        return Response::view('errors/missing', array(), 404);
    }

    // Catch Route Not Found Exception
    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {

        Log::error(
            'NotFoundHttpException Route: ' . Request::url()
        );

        return Response::view('errors/missing', array(), 404);
    }

    Log::error($exception);
});

require app_path().'/filters.php';
require app_path().'/events.php';
