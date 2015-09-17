<?php

namespace Virgil\Helper;


class Hash {

    /**
     * Generate Application token
     * @param \Application $application
     * @return string
     */
    public static function make(\Application $application) {

        return md5(
            $application->id .
            $application->account->id .
            time()
        );
    }
}