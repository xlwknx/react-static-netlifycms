<?php

class AccountType extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account_type';

    public static function get() {

        return array(
            array(
                'id' => 1,
                'name' => 'Free',
                'limit_application' => 2,
                'limit_keyring' => 100,
                'limit_pki' => 100,
                'limit_auth' => 100
            ),
            array(
                'id' => 2,
                'name' => 'Maximum',
                'limit_application' => 9999,
                'limit_keyring' => 9999,
                'limit_pki' => 9999,
                'limit_auth' => 9999
            )
        );
    }

}