<?php

use Virgil\Validator\Account as AccountValidator;

class SessionController extends AbstractController {

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
            'pages.session.signin'
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
            'pages.session.signup'
        );

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
