<?php

use Virgil\Validator\Account as AccountValidator;


class AccountController extends AbstractController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

    public function signin() {

        if(Request::isMethod('post')) {

            $result = AccountValidator::validateSigninAction(
                Input::all()
            );

            if($result instanceof Illuminate\Http\RedirectResponse) {
                return $result;
            }

            return $result->setupSession();
        }

        $this->setActivePage('signin');
        $this->layout->content = View::make(
            'pages.account.signin'
        );

    }

    public function signup() {

        if(Request::isMethod('post')) {

            $result = AccountValidator::validateSignupAction(
                Input::all()
            );
            if($result instanceof Illuminate\Http\RedirectResponse) {
                return $result;
            }

            $account = Account::createAccount(
                $result['email'],
                $result['password']
            );

            return $account->setupSession();
        }

        $this->setActivePage('signin');
        $this->layout->content = View::make(
            'pages.account.signup'
        );

    }

    public function resetPassword()
    {

        $data = array(
            'resetResult'     => false,
            'resetSuccessful' => ''
        );

        if(Request::isMethod('post')) {

            $result = AccountValidator::validateResetPasswordAction(
                Input::all()
            );
            if($result instanceof Illuminate\Http\RedirectResponse) {
                return $result;
            }

            if($result->resetPassword()) {
                $data['resetResult']  = true;
                $data['resetMessage'] = Lang::get('message.flash.reset-password');
            }
        }

        $this->setActivePage('reset-password');
        $this->layout->content = View::make(
            'pages.account.reset-password',
            $data
        );
    }

    public function updatePassword($token) {

        $account = AccountValidator::validateToken($token);
        if($account instanceof Illuminate\Http\RedirectResponse) {
            return $account;
        }

        $data = array(
            'updateMessage' => '',
            'resetToken'    => $token
        );

        if(Request::isMethod('post')) {

            $password = AccountValidator::validatePassword(
                Input::all()
            );

            if($password instanceof Illuminate\Http\RedirectResponse) {
                return $password;
            }

            $account->updatePassword(
                $password
            );

            $data = array(
                'updateMessage' => Lang::get('message.flash.update-password')
            );
        }

        $this->setActivePage('update-password');
        $this->layout->content = View::make(
            'pages.account.update-password',
            $data
        );
    }

    public function signout() {

        return App::make('getCurrentAccount')->closeSession();
    }

} 
