<?php

use Virgil\Mail\Sender;

Event::listen('auth.login', function($account)  {
    $account->last_login = new DateTime;
    $account->save();
});

Event::listen('auth.reset.password', function($account)  {

    Sender::sendResetPasswordMail(
        $account
    );
});