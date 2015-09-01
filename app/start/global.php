<?php

use Symfony\Component\HttpFoundation\Response;

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

Log::useFiles(storage_path().'/logs/laravel.log');

App::error(function(Exception $exception, $code)
{    
    if($code == 404 && BrowserDetect::isDesktop()) {
        return Redirect::to('/');
    }

    if($exception instanceof \Virgil\Exception\Validator) {
        return Response::json(array(
            'error' => array(
                'code' => $exception->getCode()
            )
        ), Response::HTTP_BAD_REQUEST);
    }

    // Catch Method Not Allowed Exception
    if($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
        return Response::json(array(
            'error' => array(
                'code' => Virgil\Error\Code::ROUTE_NOT_ALLOWED
            )
        ), Response::HTTP_INTERNAL_SERVER_ERROR);

        Log::error(
            'NotAllowedHttpException Route: ' . Request::url()
        );
    }

    // Catch Route Not Found Exception
    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
        return Response::json(array(
            'error' => array(
                'code' => Virgil\Error\Code::ROUTE_WAS_NOT_FOUND
            )
        ), Response::HTTP_INTERNAL_SERVER_ERROR);

        Log::error(
            'NotFoundHttpException Route: ' . Request::url()
        );
    }

    Log::error($exception);
});

require app_path().'/filters.php';
