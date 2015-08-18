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
     * @param $company
     * @return array
     */
    public static function validateSignup($email, $password, $company) {

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

        $company = trim($company);
        if(!$company) {
            return array(
                'result' => false,
                'message' => ErrorMessage::ACCOUNT_COMPANY_NOT_PROVIDED
            );
        }

        if(!preg_match('/^[a-z\s]{2,}$/i', $company)) {
            return array(
                'result' => false,
                'message' => ErrorMessage::ACCOUNT_COMPANY_VALIDATION_FAILED
            );
        }

        $account = \Account::where(
            'email',
            $email
        )->orWhere(
            'company',
            $company
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