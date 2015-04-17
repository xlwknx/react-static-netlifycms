<?php

class Account extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account';


    public static function createAccount($data) {

        $account = new Account();
        $account->username = $data['username'];
        $account->password = md5($data['password']);
        $account->type_id  = $data['type'];

        $account->save();

        return $account;
    }

    public static function getAccountByAuthToken($token) {

        $authentication = \Authentication::whereToken(
            $token
        )->first();

        if($authentication) {
            return $authentication->account;
        }

        return false;
    }

    public function type() {

        return $this->belongsTo('AccountType');
    }
}