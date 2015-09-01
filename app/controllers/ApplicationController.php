<?php

use Virgil\Validator\Application as ApplicationValidator,
    Symfony\Component\HttpFoundation\Response as HttpResponse;

class ApplicationController extends AbstractController {

    public static function validateToken() {

        $serviceId = Input::json()->get('service_id', null);
        $resource  = Input::json()->get('resource', null);
        $appToken  = Input::json()->get('app_token', null);

        $application = ApplicationValidator::validateToken(
            $appToken
        );

        ApplicationLog::log(
            $serviceId,
            $resource,
            $application
        );

        return \Response::json(array(
            'identity' => $application->getIdentity()
        ), HttpResponse::HTTP_OK);
    }
}