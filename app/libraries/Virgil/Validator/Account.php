<?php

namespace Virgil\Validator;

use \Validator,
    \Redirect,
    \Input,

    \Account as AccountModel;


class Account {

    protected static $_validators = array(
        'email'    => 'email|required',
        'password' => 'required'
    );

    /**
     * Validate 'signin' request
     *
     * @param $parameters
     * @return \Account
     */
    public static function validateSigninAction($parameters) {

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

        if($account->isResetPasswordInProgress()) {
            return Redirect::to('/signin')->with(
                'error',
                'validation.custom.account.reset_in_progress'
            )->withInput(
                Input::except('password')
            );
        }

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

    /**
     * Validate 'signup' request
     *
     * @param $parameters
     * @return array
     */
    public static function validateSignupAction($parameters) {

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
            'email'    => $parameters['email'],
            'password' => $parameters['password']
        );
    }

    /**
     * Validate 'reset-password' request
     *
     * @param $parameters
     * @return mixed
     */
    public static function validateResetPasswordAction($parameters) {

        $validator = Validator::make(
            $parameters,
            array(
                'email' => 'required|email'
            )
        );

        if($validator->fails()) {
            return Redirect::to('/reset-password')->withInput()->withErrors(
                $validator
            );
        }

        $account = AccountModel::getAccountByEmail(
            $parameters['email']
        );

        if(!$account) {

            return Redirect::to('/reset-password')->with(
                'error',
                'validation.custom.account.not_exists'
            )->withInput();
        }

        return $account;
    }

    /**
     * Validate Account by Account Reset token
     *
     * @param $token
     * @return Account
     */
    public static function validateToken($token) {

        $account = AccountModel::getAccountByToken($token);
        if(!$account) {

            return Redirect::to('/update-password')->with(
                'error',
                'validation.custom.account.token_invalid'
            );
        }

        return $account;
    }

    /**
     * Validate new Account password
     *
     * @param $parameters
     * @return mixed
     */
    public static function validatePassword($parameters) {

        $validator = Validator::make(
            $parameters,
            array(
                'new_password' => 'required|min:5|max|255',
                'confirm_password' => 'required|min:5|max:255'
            )
        );

        if($validator->fails()) {
            return Redirect::to('/update-password')->withErrors(
                $validator
            );
        }

        return $parameters['new_password'];
    }
}