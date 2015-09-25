<?php

namespace Virgil;

use \Account;

class Auth extends \Auth {

    /**
     * @param $credentials
     *
     * @return bool
     */
    public static function attempt($credentials) {

        if ( ! isset( $credentials['password'] ) or ! isset( $credentials['email'] )) {
            return false;
        }

        $user = Account::whereEmail(
            $credentials['email']
        )->wherePassword(
            md5($credentials['password'])
        )->first();

        if ($user) {
            Auth::login($user);
        }

        return $user;
    }
}