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
     * @param $applicationAlias - application alias
     * @return array
     * @throws \Virgil\Exception\Validator
     */
    public static function validate($applicationName, $applicationDescription, $applicationUrl, $applicationAlias) {

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

        if(empty($applicationAlias)) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_ALIAS_NOT_PROVIDED
            );
        }

        return array(
            'name' => $applicationName,
            'description' => $applicationDescription,
            'url' => $applicationUrl,
            'alias' => $applicationAlias
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
     * Validate Application token
     *
     * @param $appToken
     * @return array
     * @throws \Virgil\Exception\Validator
     */
    public static function validateToken($appToken) {

        $application = \Application::getApplicationByToken(
            $appToken
        );

        if(!$application) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_KEY_NOT_FOUND
            );
        }

        return $application;
    }
} 