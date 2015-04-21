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
     * @param $data
     * @return Account
     */
    public static function createAccount($data) {

        $account = new Account();
        $account->email     = $data['email'];
        $account->password  = md5($data['password']);
        $account->type_id   = $data['type'];
        $account->confirmed = self::ACCOUNT_UNCONFIRMED;

        $account->save();

        $confirmation = AccountConfirmation::createConfirmation(
            $account
        );

        Mail::send(
            'email.confirmation',
            array('confirmationCode' => $confirmation->code),
            function($message) use ($account) {
                $message->to(
                    $account->email,
                    $account->email
                )->subject('VirgilSecurity KeyRing email confirmation');
            }
        );

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

    /**
     * Is Account confirmed
     *
     * @return bool
     */
    public function isConfirmed() {

        return $this->confirmed == self::ACCOUNT_CONFIRMED ? true : false;
    }
}