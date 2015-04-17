<?php

namespace Virgil\Validator;

use Virgil\Exception\Validator as ValidatorException,
    Virgil\Error\Code as ErrorCode;


class Application {


    public static function validate($application) {

        if(!isset($application['name'])) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_NAME_NOT_PROVIDED
            );
        }

        if(!isset($application['description'])) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_DESCRIPTION_NOT_PROVIDED
            );
        }

        if(!isset($application['url'])) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_URL_NOT_PROVIDED
            );
        }

        return $application;
    }

    public static function exists($account, $application) {

        $application = \Application::whereAccountId(
            $account->id
        )->whereId(
            $application
        )->first();

        if(!$application) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_NOT_FOUND
            );
        }

        return $application;
    }

    public static function validateKey($service, $appKey) {

        $application = \Application::getApplicationByKey(
            $appKey
        );

        if(!$application) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_KEY_NOT_FOUND
            );
        }

        $service = \AllowedService::getServiceByName(
            $service
        );

        if(!$service) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_SERVICE_NOT_RECOGNIZED
            );
        }

        $count = \ApplicationStatistic::getServiceLimit(
            $application,
            $service
        );

        if(++$count > $application->account->type->{'limit_' . $service->service}) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_CALL_LIMIT_EXCEEDED
            );
        }

        return array(
            'application' => $application,
            'service' => $service
        );
    }
} 