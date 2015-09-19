<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Exception\Validator as ValidatorException;


class Token {

    protected static $_tokenValidatorRules = [
        'token' => 'required|exists:application_token,token'
    ];

    /**
     * Get Validator rules for Token parameter
     * @return array
     */
    public static function getTokenValidatorRules() {

        return self::$_tokenValidatorRules;
    }

    /**
     * Validate token information
     * @param $parameters
     * @return bool
     * @throws ValidatorException
     */
    public static function validate($parameters) {

        $resource = $parameters->get('resource');
        if(!$resource) {
            throw new ValidatorException(
                ErrorCode::TOKEN_VALIDATION_RESOURCE_NOT_PROVIDED
            );
        }

        $serviceId = $parameters->get('service_id');
        if(!$serviceId) {
            throw new ValidatorException(
                ErrorCode::TOKEN_VALIDATION_SERVICE_ID_NOT_PROVIDED
            );
        }

        $token = $parameters->get('app_token');
        if(!$token) {
            throw new ValidatorException(
                ErrorCode::TOKEN_VALIDATION_TOKEN_NOT_FOUND
            );
        }

        $token = \ApplicationToken::whereToken($token)->first();
        if(!$token) {
            throw new ValidatorException(
                ErrorCode::TOKEN_VALIDATION_TOKEN_NOT_FOUND
            );
        }

        if(!$token->active) {
            throw new ValidatorException(
                ErrorCode::TOKEN_VALIDATION_TOKEN_NOT_YET_ACTIVATED
            );
        }

        return true;
    }
}