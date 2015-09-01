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

        return Response::view('errors/missing', array(), 404);

        Log::error(
            'NotAllowedHttpException Route: ' . Request::url()
        );
    }

    // Catch Route Not Found Exception
    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {

        return Response::view('errors/missing', array(), 404);

        Log::error(
            'NotFoundHttpException Route: ' . Request::url()
        );
    }

    Log::error($exception);
});

require app_path().'/filters.php';
