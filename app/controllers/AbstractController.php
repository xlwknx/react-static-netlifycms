<?php

class AbstractController extends Controller {

    public function getCurrentAccount() {

        return \Account::getAccountByAuthToken(
            Request::header('x-auth-token')
        );
    }
} 