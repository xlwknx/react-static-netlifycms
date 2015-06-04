<?php

use Virgil\Validator\Account as AccountValidator,
    Virgil\Validator\Confirmation as ConfirmationValidator,
    Symfony\Component\HttpFoundation\Response as HttpResponse;

class AccountController extends AbstractController {

    public function confirm($code) {

        $confirmation = ConfirmationValidator::validateCode(
            $code
        );

        $confirmation->confirmAccount();

        return \Response::json(
            null,
            HttpResponse::HTTP_OK
        );
    }

    public function resendConfirm() {

        $account = AccountValidator::validateSignin(
            Input::json()->get('email', null),
            Input::json()->get('password', null)
        );

        AccountValidator::validateConfirmed(
            $account
        );

        Confirmation::createConfirmation(
            $account
        );

        return \Response::json(
            null,
            HttpResponse::HTTP_OK
        );
    }

    public function typeList() {

        $list = \AccountType::all();

        $data = array();
        foreach($list as $type) {
            $data[] = $type->jsonSerialize();
        }

        return \Response::json(
            $data, HttpResponse::HTTP_OK
        );
    }
} 