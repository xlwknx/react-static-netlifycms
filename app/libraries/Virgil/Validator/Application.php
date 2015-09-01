<?php

namespace Virgil\Validator;

use \Validator,
    \Redirect,

    \Application as ApplicationModel,
    \Account as AccountModel,

    Virgil\Exception\Validator as ValidatorException,
    Virgil\Error\Code as ErrorCode;


class Application {

    protected static $_validators = array(
        'application_name'        => 'required|max:255',
        'application_description' => 'required|max:255',
        'application_url'         => 'url',
    );

    public static function validateCreate($parameters) {

        $validator = Validator::make(
            $parameters,
            self::$_validators
        );

        if($validator->fails()) {
            return Redirect::to('/dashboard/application/create')->withInput()->withErrors(
                $validator
            );
        }

        return $parameters;
    }

    /**
     * Validate Account Application existing
     *
     * @param \Account $account
     * @param $uuid
     * @return bool
     */
    public static function validateExists(AccountModel $account, $uuid) {

        $application = ApplicationModel::getApplication(
            $account,
            $uuid
        );

        if(!$application) {
            return false;
        }

        return true;
    }

    /**
     * Validate if Application already exists
     *
     * @param $account
     * @param $application
     * @return mixed
     * @throws \Virgil\Exception\Validator
     */
    public static function exists($account, $application) {

        $application = \Application::whereAccountId(
            $account->id
        )->whereId(
            $application
        )->first();

        if(!$application) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_NOT_FOUND
            );
        }

        return $application;
    }

    /**
     * Validate Application token
     *
     * @param $appToken
     * @return array
     * @throws \Virgil\Exception\Validator
     */
    public static function validateToken($appToken) {

        $application = \Application::getApplicationByToken(
            $appToken
        );

        if(!$application) {
            throw new ValidatorException(
                ErrorCode::APPLICATION_KEY_NOT_FOUND
            );
        }

        return $application;
    }
} 