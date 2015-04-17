<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Validator\AccountType as AccountTypeValidator,
    Virgil\Exception\Validator as ValidatorException;


class Account {

    public static function validateSignin($data) {

        $account = \Account::whereUsername(
            $data['username']
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

    public static function validateSignup($data) {

        if(!isset($data['username'])) {
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

        $account = \Account::whereUsername(
            $data['username']
        )->wherePassword(
            $data['password']
        )->first();

        if($account) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_ALREADY_EXISTS
            );
        }

        return $data;
    }

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