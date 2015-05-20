<?php

class AbstractController extends Controller {

    public function getCurrentAccount() {

        return \Account::getAccountByAuthToken(
            Request::header('x-auth-token')
        );
    }

    protected function setupLayout(){

        if(!is_null($this->layout)) {
            $this->layout = View::make(
                $this->layout
            );
        }

        View::share(
            'auth_token',
            Cookie::get('auth_token')
        );
    }
} 