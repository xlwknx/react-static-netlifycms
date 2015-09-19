<?php

use Virgil\Validator\Token as TokenValidator,

    Symfony\Component\HttpFoundation\Response as HttpResponse;

class TokenController extends AbstractController {

    public static function validate() {

        TokenValidator::validate(
            Input::json()
        );

        $token = ApplicationToken::whereToken(
            Input::json()->get('app_token')
        )->first();

        $token->logs()->save(
            new ApplicationTokenLog(array(
                'service_id' => Input::json()->get('service_id'),
                'resource'   => Input::json()->get('resource'),
            ))
        );

        return \Response::json(array(
            'identity' => $token->application->getIdentity()
        ), HttpResponse::HTTP_OK);
    }

    public function createToken() {

        App::make('getApplication')->tokens()->save(
            new ApplicationToken()
        );

        return Redirect::to('/dashboard');
    }

    public function changeActiveState() {

        App::make('getToken')->changeActiveState();
        return Redirect::to('/dashboard');
    }
}