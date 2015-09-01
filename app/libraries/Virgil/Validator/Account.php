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

    /**
     * Validate 'signup' request
     *
     * @param $parameters
     * @return array
     */
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
     * Validate 'reset-password' request
     *
     * @param $parameters
     * @return mixed
     */
    public static function validateReset($parameters) {

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
}