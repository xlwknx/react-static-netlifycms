<?php

Event::listen('auth.login', function($account)
{
    $account->last_login = new DateTime;
    $account->save();

});