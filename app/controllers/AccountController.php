<?php

use Virgil\Validator\Account as AccountValidator,
    Virgil\Validator\Authentication as AuthenticationValidator,
    Virgil\Validator\Confirmation as ConfirmationValidator,
    Symfony\Component\HttpFoundation\Response as HttpResponse;

class AccountController extends AbstractController {

    public function signin() {

        $account = AccountValidator::validateSignin(
            Input::json()->get('account', null)
        );

        return \Response::json(array(
            'auth_token' => Authentication::getAuthToken(
                $account
            )
        ), HttpResponse::HTTP_OK);
    }

    public function signout() {

        $authentication = AuthenticationValidator::validateAuthToken(
            Input::json()->get('auth_token', null)
        );

        Authentication::clearAuthToken(
            $authentication
        );

        return \Response::json(
            null,
            HttpResponse::HTTP_OK
        );
    }

    public function signup() {

        $account = Account::createAccount(
            AccountValidator::validateSignup(
                Input::json()->get('account', null)
            )
        );

        return \Response::json(array(
            'id' => $account->id,
            'type' => $account->type_id,
            'email' => $account->email,
            'confirmed' => $account->isConfirmed()
        ), HttpResponse::HTTP_OK);
    }

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
            Input::json()->get('account', null)
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