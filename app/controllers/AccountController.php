<?php

use Virgil\Validator\Account as AccountValidator;

class AccountController extends AbstractController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

    public function signin() {

        if(Request::isMethod('post')) {

            $result = AccountValidator::validateSignin(
                Input::all()
            );

            if($result instanceof Illuminate\Http\RedirectResponse) {
                return $result;
            }

            Cookie::queue(
                'auth_token',
                $result->getSessionToken(),
                Authentication::AUTH_TOKEN_LIFETIME
            );

            return Redirect::to('dashboard');
        }

        $this->setActivePage('signin');
        $this->layout->content = View::make(
            'pages.account.signin'
        );

    }

    public function signup() {

        if(Request::isMethod('post')) {

            $result = AccountValidator::validateSignup(
                Input::all()
            );

            if($result instanceof Illuminate\Http\RedirectResponse) {
                return $result;
            }

            $account = Account::createAccount(
                $result['email'],
                $result['password']
            );

            Cookie::queue(
                'auth_token',
                $account->getSessionToken(),
                Authentication::AUTH_TOKEN_LIFETIME
            );

            return Redirect::to('dashboard');
        }

        $this->setActivePage('signin');
        $this->layout->content = View::make(
            'pages.account.signup'
        );

    }

    public function resetPassword()
    {

        $data = array(
            'resetResult' => false
        );

        if(Request::isMethod('post')) {

            $result = AccountValidator::validateReset(
                Input::all()
            );

            if($result instanceof Illuminate\Http\RedirectResponse) {
                return $result;
            }

            if($result->reset()) {
                $data['resetResult'] = true;
                $data['resetSuccessful'] = Lang::get('message.flash.reset-password');
            }
        }

        $this->setActivePage('reset');
        $this->layout->content = View::make(
            'pages.account.reset-password',
            $data
        );
    }

    public function updatePassword() {

    }

    public function signout() {

        Cookie::queue(
            'auth_token',
            null,
            -1
        );

        return Redirect::to('/');
    }

} 
