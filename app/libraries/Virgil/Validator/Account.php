<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Validator\AccountType as AccountTypeValidator,
    Virgil\Exception\Validator as ValidatorException;


class Account {

    /**
     * Validate signin action
     *
     * @param $data   - data for validation
     * @return mixed
     * @throws \Virgil\Exception\Validator
     */
    public static function validateSignin($data) {

        $account = \Account::whereUsername(
            $data['email']
        )->wherePassword(
            md5($data['password'])
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
     * @param $data   - data for validation
     * @return mixed
     * @throws \Virgil\Exception\Validator
     */
    public static function validateSignup($data) {

        if(!isset($data['email'])) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_USERNAME_NOT_PROVIDED
            );
        }

        if(!isset($data['password'])) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_PASSWORD_NOT_PROVIDED
            );
        }

        if(!isset($data['type'])) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_TYPE_NOT_PROVIDED
            );
        }

        AccountTypeValidator::exists(
            $data['type']
        );

        $account = \Account::whereEmail(
            $data['email']
        )->first();

        if($account) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_ALREADY_EXISTS
            );
        }

        return $data;
    }

    /**
     * Validate if Account already confirmed
     *
     * @param $account
     * @return bool
     * @throws \Virgil\Exception\Validator
     */
    public static function validateConfirmed($account) {

        if(!$account->isConfirmed()) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_NOT_CONFIRMED
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