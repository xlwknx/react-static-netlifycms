<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Exception\Validator as ValidatorException;

class AccountType {

    public static function exists($type) {

        if(!\AccountType::find($type)) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_TYPE_NOT_FOUND
            );
        }

        return true;
    }

}