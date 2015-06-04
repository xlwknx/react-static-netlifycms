<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Exception\Authentication as AuthenticationException;

class Authentication {

    /**
     * Validate Authentication tokens
     *
     * @param $token
     * @return mixed
     * @throws \Virgil\Exception\Validator
     * @throws \Virgil\Exception\Authentication
     */
    public static function validateAuthToken($token) {

        $authentication = \Authentication::whereToken(
            $token
        )->first();

        if(!$authentication) {
            throw new AuthenticationException(
                ErrorCode::AUTHENTICATION_TOKEN_NOT_FOUND
            );
        }

        if((strtotime('now') - strtotime($authentication->created_at)) / 60 > \Authentication::AUTH_TOKEN_LIFETIME) {
            throw new AuthenticationException(
                ErrorCode::AUTHENTICATION_TOKEN_EXPIRED
            );
        }

        $authentication->updateTokenTime();

        return $authentication;
    }
} 