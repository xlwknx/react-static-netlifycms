<?php

use Virgil\Validator\Account as AccountValidator,
    Virgil\Validator\Authentication as AuthenticationValidator,
    Virgil\Validator\Confirmation as ConfirmationValidator,
    Symfony\Component\HttpFoundation\Response as HttpResponse;

class AccountController extends AbstractController {

    public function signin() {

        $account = AccountValidator::validateSignin(
            Input::json()->get('email', null),
            Input::json()->get('password', null)
        );

        $authToken = Authentication::getAuthToken(
            $account
        );

        Cookie::queue(
            'auth_token',
            $authToken,
            Authentication::AUTH_TOKEN_LIFETIME
        );

        return \Response::json(array(
            'auth_token' => $authToken
        ), HttpResponse::HTTP_OK);
    }

    public function signout() {

        $authentication = AuthenticationValidator::validateAuthToken(
            Input::json()->get('auth_token', null)
        );

        Authentication::clearAuthToken(
            $authentication
        );

        Cookie::queue('auth_token', null, -1);

        return \Response::json(
            null,
            HttpResponse::HTTP_OK
        );
    }

    public function signup() {

        $account = Account::createAccount(
            AccountValidator::validateSignup(
                Input::json()->get('email', null),
                Input::json()->get('password', null),
                Input::json()->get('company_name', null)
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