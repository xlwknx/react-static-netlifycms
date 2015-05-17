<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Validator\AccountType as AccountTypeValidator,
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

        if(!$account) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_NOT_FOUND
            );
        }

        return $account;
    }

    /**
     * Validate signup action
     *
     * @param $email - account email
     * @param $password - account password
     * @param $companyName - account name
     * @return mixed
     * @throws \Virgil\Exception\Validator
     */
    public static function validateSignup($email, $password, $companyName) {

        if(!isset($email)) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_USERNAME_NOT_PROVIDED
            );
        }

        if(!isset($password)) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_PASSWORD_NOT_PROVIDED
            );
        }

        /*
        if(!isset($data['type'])) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_TYPE_NOT_PROVIDED
            );
        }

        AccountTypeValidator::exists(
            $data['type']
        );
        */
        $account = \Account::whereEmail(
            $email
        )->first();

        if($account) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_ALREADY_EXISTS
            );
        }

        return array(
            'email' => $email,
            'password' => $password,
            'company_name' => $companyName
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