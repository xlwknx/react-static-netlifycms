<?php

use Virgil\Validator\Account as AccountValidator,
    Virgil\Validator\Authentication as AuthenticationValidator,
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
            'account' => array(
                'id' => $account->id,
                'type' => $account->type_id,
                'email' => $account->email,
                'confirmed' => $account->isConfirmed()
            )
        ), HttpResponse::HTTP_OK);
    }

    public function typeList() {

        $list = \AccountType::all();

        $data = array();
        foreach($list as $type) {
            $data[] = $type->jsonSerialize();
        }

        return \Response::json(array(
            'data' => $data
        ), HttpResponse::HTTP_OK);
    }
} 