<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Error\Message as ErrorMessage,
    Virgil\Exception\Validator as ValidatorException;


class Account {

    /**
     * Validate signin action
     *
     * @param $email - account email
     * @param $password - account password
     * @return mixed
     * @throws \Virgil\Exception\Validator
     */
    public static function validateSignin($email, $password) {

        $account = \Account::whereEmail(
            $email
        )->wherePassword(
            md5($password)
        )->first();

        return $account;
    }

    /**
     * Validate signup action
     *
     * @param $email
     * @param $password
     * @param $domain
     * @return array
     */
    public static function validateSignup($email, $password, $domain) {

        if(!$email) {
            return array(
                'result' => false,
                'message' => ErrorMessage::ACCOUNT_EMAIL_NOT_PROVIDED
            );
        }

        if(!$password) {
            return array(
                'result' => false,
                'message' => ErrorMessage::ACCOUNT_PASSWORD_NOT_PROVIDED
            );
        }

        if(!$domain) {
            return array(
                'result' => false,
                'message' => ErrorMessage::ACCOUNT_DOMAIN_NOT_PROVIDED
            );
        }

        $account = \Account::whereEmail(
            $email
        )->first();

        if($account) {
            return array(
                'result' => false,
                'message' => ErrorMessage::ACCOUNT_ALREADY_EXISTS
            );
        }

        return array(
            'result' => true,
        );
    }

    /**
     * Validate if Account not confirmed yet
     *
     * @param $account
     * @return bool
     * @throws \Virgil\Exception\Validator
     */
    public static function validateNotConfirmed($account) {

        if(!$account->isConfirmed()) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_NOT_CONFIRMED
            );
        }

        return true;
    }

    /**
     * Validate if Account already confirmed
     *
     * @param $account
     * @return bool
     * @throws \Virgil\Exception\Validator
     */
    public static function validateConfirmed($account) {

        if($account->isConfirmed()) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_ALREADY_CONFIRMED
            );
        }

        return true;
    }

    /**
     * Validate Application limit
     *
     * @param $account
     * @return bool
     * @throws \Virgil\Exception\Validator
     */
    public static function validateLimit($account) {

        $count = count(
            \Application::getAccountApplicationList(
                $account
            )
        );

        if(++$count > $account->type->limit_application) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_LIMIT_EXCEEDED
            );
        }

        return true;
    }

} 