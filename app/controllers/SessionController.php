<?php

use Virgil\Validator\Authentication as AuthenticationValidator,
    Virgil\Validator\Account as AccountValidator,
    Virgil\Error\Message as ErrorMessage;

class SessionController extends AbstractController {

    public function signin() {

        $account = AccountValidator::validateSignin(
            Input::get('email', null),
            Input::get('password', null)
        );

        if(!$account) {
            return Redirect::to('/signin')->with(
                'error',
                ErrorMessage::ACCOUNT_NOT_FOUND
            )->withInput(
                Input::except('password')
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

        Cookie::queue(
            'auth_token',
            null,
            -1
        );

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
            )->withInput(
                Input::except('password')
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

} 
