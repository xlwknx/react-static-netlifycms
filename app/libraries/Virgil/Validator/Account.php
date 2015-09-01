<?php

namespace Virgil\Validator;

use \Validator,
    \Redirect,
    \Input,

    \Account as AccountModel,

    Virgil\Error\Code as ErrorCode,
    Virgil\Exception\Validator as ValidatorException;


class Account {

    protected static $_validators = array(
        'email'    => 'email|required',
        'password' => 'required'
    );

    /**
     * Validate signin Account action
     *
     * @param $parameters
     * @return Account|Illuminate\Http\RedirectResponse
     */
    public static function validateSignin($parameters) {

        $validator = Validator::make(
            $parameters,
            self::$_validators
        );

        if($validator->fails()) {
            return Redirect::to('/signin')->withInput(
                Input::except('password')
            )->withErrors(
                $validator
            );
        }

        $account = AccountModel::getAccountByEmailAndPassword(
            $parameters['email'],
            $parameters['password']
        );

        if(!$account) {

            return Redirect::to('/signin')->with(
                'error',
                'validation.custom.account.not_exists'
            )->withInput(
                Input::except('password')
            );
        }

        return $account;
    }


    public static function validateSignup($parameters) {

        $validator = Validator::make(
            $parameters,
            array_merge(
                array(
                    'confirm_password' => 'same:password'
                ),
                self::$_validators
            )
        );

        if($validator->fails()) {
            return Redirect::to('/signup')->withInput(
                Input::except('password')
            )->withErrors(
                $validator
            )->withInput(
                Input::except('password')
            );
        }

        $account = AccountModel::getAccountByEmailAndPassword(
            $parameters['email'],
            $parameters['password']
        );

        if($account) {

            return Redirect::to('/signup')->with(
                'error',
                'validation.custom.account.exists'
            )->withInput(
                Input::except('password')
            );
        }

        return array(
            'email' => $parameters['email'],
            'password' => $parameters['password']
        );
    }

    /**
     * Validate if Account not confirmed yet
     *
     * @param Account $account
     * @return bool
     * @throws \Virgil\Exception\Validator
     */
    public static function validateNotConfirmed(Account $account) {

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
     * @param Account $account
     * @return bool
     * @throws \Virgil\Exception\Validator
     */
    public static function validateConfirmed(Account $account) {

        if($account->isConfirmed()) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_ALREADY_CONFIRMED
            );
        }

        return true;
    }
}