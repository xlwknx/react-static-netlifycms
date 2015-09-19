<?php

namespace Virgil\Mail;

class Sender {

    /**
     * Send Reset Password email
     * @param Account $account
     * @return mixed
     */
    public static function sendResetPasswordMail($account)
    {
        return \Mail::send(
            'email.reset-password',
            array('code' => $account->confirmation_code),
            function($message) use ($account) {
                $message->to(
                    $account->email,
                    $account->email
                )->subject('VirgilSecurity Reset Password Email');
            }
        );
    }
}