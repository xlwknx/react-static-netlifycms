<?php

class Account extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account';

    /**
     * Create new Account instance
     *
     * @param $data
     * @return Account
     */
    public static function createAccount($data) {

        $account = new Account();
        $account->username = $data['username'];
        $account->password = md5($data['password']);
        $account->type_id  = $data['type'];

        $account->save();

        return $account;
    }

    /**
     * Get Account instance by Authentication token
     *
     * @param $token
     * @return bool
     */
    public static function getAccountByAuthToken($token) {

        $authentication = \Authentication::whereToken(
            $token
        )->first();

        if($authentication) {
            return $authentication->account;
        }

        return false;
    }

    /**
     * Get AccountType relation instance
     *
     * @return mixed
     */
    public function type() {

        return $this->belongsTo('AccountType');
    }
}