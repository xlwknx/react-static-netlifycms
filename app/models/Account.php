<?php

class Account extends Eloquent {

    /**
     * Account confirmed states
     */
    const ACCOUNT_UNCONFIRMED = 0;
    const ACCOUNT_CONFIRMED   = 1;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account';

    /**
     * Create new Account instance
     *
     * @param $email
     * @param $password
     * @param $companyName
     * @return Account
     */
    public static function createAccount($email, $password, $companyName) {

        $account = new Account();
        $account->email     = $email;
        $account->password  = md5($password);
        $account->company_name = $companyName;
        $account->confirmed = self::ACCOUNT_CONFIRMED;

        $account->save();

        /*
        Confirmation::createConfirmation(
            $account
        );
        */
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
     * Is Account confirmed
     *
     * @return bool
     */
    public function isConfirmed() {

        return $this->confirmed == self::ACCOUNT_CONFIRMED ? true : false;
    }
}