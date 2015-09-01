<?php

use Authentication as AuthenticationModel,
    Application as ApplicationModel,
    Account as AccountModel,

    Virgil\Helper\UUID;

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
     * @param $email - Account email
     * @param $password - Account password
     * @return Account
     */
    public static function createAccount($email, $password) {

        $account = new Account();
        $account->email        = $email;
        $account->password     = md5($password);
        $account->confirmed    = self::ACCOUNT_CONFIRMED;
        $account->uuid         = UUID::generate();

        $account->save();

        return $account;
    }

    /**
     * Get Account instance by Account Email and Account Password
     *
     * @param $email
     * @param $password
     * @return Account
     */
    public static function getAccountByEmailAndPassword($email, $password) {

        return AccountModel::where(
            'email',
            $email
        )->where(
            'password',
            md5($password)
        )->first();
    }

    /**
     * Get Account Session token
     *
     * @return string
     */
    public function getSessionToken() {

        return AuthenticationModel::getSessionToken(
            $this
        );
    }

    /**
     * Is Account confirmed
     *
     * @return bool
     */
    public function isConfirmed() {

        return $this->confirmed == self::ACCOUNT_CONFIRMED ? true : false;
    }

    /**
     * Get Account Application list
     *
     * @return mixed
     */
    public function getApplicationList() {

        return ApplicationModel::getAccountApplicationList(
            $this
        );

    }
}