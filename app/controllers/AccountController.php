<?php

use Virgil\Validator\Account as AccountValidator,
    Virgil\Validator\Authentication as AuthenticationValidator,
    Virgil\Validator\Confirmation as ConfirmationValidator,
    Symfony\Component\HttpFoundation\Response as HttpResponse;

class AccountController extends AbstractController {

    public function signin() {

        $account = AccountValidator::validateSignin(
            Input::get('email', null),
            Input::get('password', null)
        );

        if(!$account) {
            return Redirect::to('/signin')->with(
                'error',
                'Account was not found.'
            );
        }

        $authToken = Authentication::getAuthToken(
            $account
        );

        Cookie::queue(
            'auth_token',
            $authToken,
            Authentication::AUTH_TOKEN_LIFETIME
        );

        return Redirect::to('dashboard');
    }

    public function signout() {

        $authentication = AuthenticationValidator::validateAuthToken(
            Cookie::get(
                'auth_token'
            )
        );

        Authentication::clearAuthToken(
            $authentication
        );

        Cookie::queue('auth_token', null, -1);

        return Redirect::to('/');
    }

    public function signup() {

        $result = AccountValidator::validateSignup(
            Input::get('email', null),
            Input::get('password', null),
            Input::get('company_name', null)
        );

        if(!$result['result']) {
            return Redirect::to('/signup')->with(
                'error',
                $result['message']
            );
        }

        $authToken = Authentication::getAuthToken(
            Account::createAccount(
                Input::get('email'),
                Input::get('password'),
                Input::get('company_name')
            )
        );

        Cookie::queue(
            'auth_token',
            $authToken,
            Authentication::AUTH_TOKEN_LIFETIME
        );

        return Redirect::to('dashboard');
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