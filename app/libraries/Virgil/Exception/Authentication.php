<?php

namespace Virgil\Exception;


class Authentication extends \Exception {

    public function __construct($code = 0, Exception $previous = null)
    {
        parent::__construct("", $code, $previous);
    }

}