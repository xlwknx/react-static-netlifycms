<?php

namespace Virgil\Validator;

use Virgil\Error\Code as ErrorCode,
    Virgil\Exception\Validator as ValidatorException;

class Confirmation {

    /**
     * Validate Confirmation instance
     *
     * @param $code
     * @return bool
     * @throws \Virgil\Exception\Validator
     */
    public static function validateCode($code) {

        $confirmation = \Confirmation::whereCode($code)->first();
        if(!$confirmation) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_CONFIRMATION_NOT_FOUND
            );
        }

        if((strtotime('now') - strtotime($confirmation->created_at)) / 60 > \Confirmation::VERIFICATION_TOKEN_LIFETIME) {
            throw new ValidatorException(
                ErrorCode::ACCOUNT_CONFIRMATION_CODE_EXPIRED
            );
        }

        return $confirmation;
    }
} 