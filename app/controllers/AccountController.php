<?php


use Virgil\Validator\Account as AccountValidator,
    Virgil\Auth,

    \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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
                return Redirect::to('/account/signin')->withInput(
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
                return Redirect::to('/account/signup')->withInput(
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
        return Redirect::to('account/signin');
    }

    public function resetPassword() {

        if(Request::isMethod('post')) {

            $validator = Validator::make(
                Input::all(), AccountValidator::getResetPasswordValidatorRules()
            );
            if($validator->fails()) {
                return Redirect::to('/account/password/reset')->withInput()->withErrors(
                    $validator
                );
            }

            $account = Account::whereEmail(
                Input::get('email')
            )->first();

            Event::fire(
                'auth.reset.password',
                $account->createConfirmationCode()
            );

            return Redirect::to(
                '/account/password/reset'
            )->with(
                'message', Lang::get('messages.flash.reset.password')
            );
        }

        $this->setActivePage('reset-password');
        $this->layout->content = View::make(
            'pages.account.reset-password',
            array()
        );
    }

    public function updatePassword($code) {

        $validator = Validator::make(
           ['confirmation_code' => $code], AccountValidator::getConfirmationCodeValidatorRules()
        );
        if($validator->fails()) {
            throw new NotFoundHttpException();
        }

        if(Request::isMethod('post')) {
            $validator = Validator::make(
                Input::all(), AccountValidator::getUpdatePasswordValidatorRules()
            );
            if($validator->fails()) {
                return Redirect::to('/account/password/update/' . $code)->withInput(
                    Input::except(array('password', 'confirm'))
                )->withErrors(
                    $validator
                );
            }

            Account::whereConfirmationCode(
                $code
            )->first()->updatePassword(
                Input::get('password')
            );

            return Redirect::to('/account/signin')->with(
                'message', Lang::get('messages.flash.update.password')
            );
        }

        $this->setActivePage('update-password');
        $this->layout->content = View::make(
            'pages.account.update-password',
            array(
                'code' => $code
            )
        );
    }

}
