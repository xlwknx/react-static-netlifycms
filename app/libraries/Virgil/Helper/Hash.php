<?php

namespace Virgil\Helper;

use \Account;


class Hash {

    const HUMAN_READABLE_CODE_LENGTH = 6;

    /**
     * Generate Application token
     * @param \Application $application
     * @return string
     */
    public static function makeApplicationToken(\Application $application) {

        return md5(
            $application->id .
            $application->account->id .
            time()
        );
    }

    /**
     * Generate Account Confirmation Code
     * @return string
     */
    public static function makeConfirmationCode() {

        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';

        do {
            $token = '';
            for ($i = 0; $i < self::HUMAN_READABLE_CODE_LENGTH; $i++) {
                $charset = $i % 2 ? $digits : $letters;
                $token .= $charset[rand(0, strlen($charset) - 1)];
            }
        } while (Account::whereConfirmationCode($token)->first());

        return $token;
    }
}