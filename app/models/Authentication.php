<?php

class Authentication extends Eloquent {

    /**
     * Auth token life time in minutes
     */
    CONST AUTH_TOKEN_LIFETIME = 5;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_authentication';

    public static function getAuthToken(Account $account) {

        // Clear old authentication token if it exists
        \Authentication::whereAccountId(
            $account->id
        )->delete();

        // Generate new one
        $authentication = new Authentication();
        $authentication->account_id = $account->id;
        $authentication->token = md5($account->id) . md5(time());

        $authentication->save();

        return $authentication->token;
    }

    public static function clearAuthToken(Authentication $authentication) {

        \Authentication::whereToken(
            $authentication->token
        )->delete();

        return true;
    }

    public function updateTokenTime() {

        $this->created_at = date('Y-m-d H:i:s');
        $this->save();
    }

    public function account() {
        return $this->belongsTo('Account');
    }
} 