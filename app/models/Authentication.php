<?php

use Authentication as AuthenticationModel;

class Authentication extends Eloquent {

    /**
     * Auth token life time in minutes
     */
    CONST AUTH_TOKEN_LIFETIME = 60;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account_session';

    /**
     * Get Authentication token
     *
     * @param Account $account
     * @return string
     */
    public static function getSessionToken(Account $account) {

        self::clearOldSession(
            $account
        );

        // Generate new one
        $authentication = new AuthenticationModel();
        $authentication->account_id = $account->id;
        $authentication->token      = md5($account->id) . md5(time());

        $authentication->save();

        return $authentication->token;
    }

    /**
     * Clear OLD Account session tokens
     *
     * @param Account $account
     */
    protected static function clearOldSession(Account $account) {

        AuthenticationModel::whereAccountId(
            $account->id
        )->delete();
    }

    /**
     * Clear Authentication token
     *
     * @param Authentication $authentication
     * @return bool
     */
    public static function clearSessionToken(Authentication $authentication) {

        AuthenticationModel::whereToken(
            $authentication->token
        )->delete();

        return true;
    }

    public static function getAccountByAuthToken($authToken) {

        return AuthenticationModel::whereToken(
            $authToken
        )->first();

    }

    /**
     * Update Authentication lifetime
     */
    public function prolongSessionToken() {

        $this->created_at = date('Y-m-d H:i:s');
        $this->save();
    }

    /**
     * Get Account relation instance
     *
     * @return mixed
     */
    public function account() {

        return $this->belongsTo('Account');
    }
} 