<?php

namespace Virgil\Validator;

class Application {

    protected static $_applicationValidatorRules = [
        'name' => 'required|max:255',
        'description' => 'required|max:255',
        'url' => 'url',
    ];

    protected static $_applicationUUIDValidatorRules = [
        'uuid' => 'required|exists:account_application,uuid'
    ];

    /**
     * Get Validator rules for Application create|update action
     * @return array
     */
    public static function getApplicationValidatorRules() {

        return self::$_applicationValidatorRules;
    }

    /**
     * Get Validator rules for Application UUID parameter
     * @return array
     */
    public static function getApplicationUUIDValidatorRules() {

        return self::$_applicationUUIDValidatorRules;
    }
} 