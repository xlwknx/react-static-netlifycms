<?php

namespace Virgil\Validator;

class Account {

    protected static $_signinValidatorRules = [
        'email'    => 'required|email',
        'password' => 'required'
    ];

    protected static $_signupValidatorRules = [
        'email'    => 'required|email|unique:account',
        'password' => 'required|min:5|max:255',
        'confirm'  => 'required|min:5|max:255|same:password'
    ];

    /**
     * Get Validator rules for Signin action
     * @return array
     */
    public static function getSigninValidatorRules() {

        return self::$_signinValidatorRules;
    }

    /**
     * Get Validator rules for Signup action
     * @return array
     */
    public static function getSignupValidatorRules() {

        return array_merge(
            self::$_signupValidatorRules
        );
    }
}