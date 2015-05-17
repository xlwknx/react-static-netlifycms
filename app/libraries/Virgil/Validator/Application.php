<?php

namespace Virgil\Validator;

use Virgil\Exception\Validator as ValidatorException,
    Virgil\Error\Code as ErrorCode;


class Application {

    /**
     * Validate Application data
     *
     * @param $applicationName - application name
     * @param $applicationDescription - application description
     * @param $applicationUrl - application url
     * @return array
     * @throws \Virgil\Exception\Validator
     */
    public static function validate($applicationName, $applicationDescription, $applicationUrl) {

        if(empty($applicationName)) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_NAME_NOT_PROVIDED
            );
        }

        if(empty($applicationDescription)) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_DESCRIPTION_NOT_PROVIDED
            );
        }

        if(empty($applicationUrl)) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_URL_NOT_PROVIDED
            );
        }

        return array(
            'name' => $applicationName,
            'description' => $applicationDescription,
            'url' => $applicationUrl
        );
    }

    /**
     * Validate if Application already exists
     *
     * @param $account
     * @param $application
     * @return mixed
     * @throws \Virgil\Exception\Validator
     */
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

    /**
     * Validate Application key
     *
     * @param $service
     * @param $appKey
     * @return array
     * @throws \Virgil\Exception\Validator
     */
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

        /*
        $count = \ApplicationStatistic::getServiceLimit(
            $application,
            $service
        );

        if(++$count > $application->account->type->{'limit_' . $service->service}) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_CALL_LIMIT_EXCEEDED
            );
        }
        */

        return array(
            'application' => $application,
            'service' => $service
        );
    }
} 