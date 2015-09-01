<?php

namespace Virgil\Helper;


class User {

    /**
     * Generate User reset token
     *
     * @return string
     */
    public static function generateResetToken() {

        return md5(time());
    }

    /**
     * Generate User password
     *
     * @param $password
     * @return string
     */
    public static function generateUserPassword($password) {

        return md5($password);
    }
} 