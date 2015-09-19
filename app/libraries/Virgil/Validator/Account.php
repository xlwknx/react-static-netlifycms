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

    protected static $_resetPasswordValidatorRules = [
        'email' => 'required|email|exists:account,email',
    ];

    protected static $_confirmationCodeValidatorRules = [
        'confirmation_code' => 'required|exists:account,confirmation_code'
    ];

    protected static $_updatePasswordValidatorRules = [
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

        return self::$_signupValidatorRules;
    }

    /**
     * Get Validator rules for Reset Password action
     * @return array
     */
    public static function getResetPasswordValidatorRules() {

        return self::$_resetPasswordValidatorRules;
    }

    /**
     * Get Validator rules for Reset Password action
     * @return array
     */
    public static function getConfirmationCodeValidatorRules() {

        return self::$_confirmationCodeValidatorRules;
    }

    /**
     * Get Validator rules for Reset Password action
     * @return array
     */
    public static function getUpdatePasswordValidatorRules() {

        return self::$_updatePasswordValidatorRules;
    }
}