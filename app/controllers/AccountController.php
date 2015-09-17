<?php

use Virgil\Validator\Account as AccountValidator;


class AccountController extends AbstractController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.public';

    public function signin() {

        if(Request::isMethod('post')) {

            $validator = Validator::make(
                Input::all(), AccountValidator::getSigninValidatorRules()
            );
            if($validator->fails()) {
                return Redirect::to('/signin')->withInput(
                    Input::except('password')
                )->withErrors(
                    $validator
                );
            }

            $userData = [
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            ];

            if (Auth::attempt($userData)) {
                return Redirect::intended('dashboard');
            } else {
                return Redirect::back()->withErrors([
                    Lang::get('validation.custom.account.not_found')
                ]);
            }
        }

        $this->setActivePage('signin');
        $this->layout->content = View::make(
            'pages.account.signin'
        );

    }

    public function signup() {

        if(Request::isMethod('post')) {

            $validator = Validator::make(
                Input::all(), AccountValidator::getSignupValidatorRules()
            );
            if($validator->fails()) {
                return Redirect::to('/signup')->withInput(
                    Input::except(array('password', 'confirm'))
                )->withErrors(
                    $validator
                );
            }

            $userData = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];

            if(Auth::validate($userData)) {
                return Redirect::back()->withInput(
                    Input::except(array('password', 'confirm'))
                )->withErrors([
                    Lang::get('validation.custom.account.already_exists')
                ]);
            }

            $account = Account::create(
                Input::all()
            );

            Auth::login($account);

            return Redirect::intended('dashboard');
        }

        $this->setActivePage('signin');
        $this->layout->content = View::make(
            'pages.account.signup'
        );
    }

    public function signout() {

        Auth::logout();
        return Redirect::to('signin');
    }

    /*
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

        $data = array(
            'updateMessage' => '',
            'errorMessage'  => '',
            'resetToken'    => $token
        );

        $account = AccountValidator::validateToken($token);
        if($account instanceof Account) {

            if(Request::isMethod('post')) {

                $password = AccountValidator::validatePassword(
                    Input::all(),
                    $token
                );

                if($password instanceof Illuminate\Http\RedirectResponse) {
                    return $password;
                }

                $data['updateMessage'] = $account->updatePassword(
                    $password
                );
            }
        } else {
            $data['errorMessage'] = Lang::get('message.flash.update-password-token-not-found');
        }

        $this->setActivePage('update-password');
        $this->layout->content = View::make(
            'pages.account.update-password',
            $data
        );
    }
    */
}
