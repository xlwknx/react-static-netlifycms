<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Exception\Validator as ValidatorException;

class Authentication {

    public static function validateAuthToken($token) {

        $authentication = \Authentication::whereToken(
            $token
        )->first();

        if(!$authentication) {
            throw new ValidatorException(
                ErrorCode::AUTHENTICATION_TOKEN_NOT_FOUND
            );
        }

        if((strtotime('now') - strtotime($authentication->created_at)) / 60 > \Authentication::AUTH_TOKEN_LIFETIME) {
            throw new ValidatorException(
                ErrorCode::AUTHENTICATION_TOKEN_EXPIRED
            );
        }

        $authentication->updateTokenTime();

        return $authentication;
    }
} 