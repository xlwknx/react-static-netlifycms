<?php

class AccountType extends Eloquent implements JsonSerializable {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account_type';

    /**
     * Get Account type list
     *
     * @return array
     */
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

    /**
     * Serialize Account Type instance
     *
     * @return array|mixed
     */
    public function jsonSerialize() {

        return array(
            'id' => $this->id,
            'name' => $this->name,
            'limit_application' => $this->limit_application,
            'limit_keyring' => $this->limit_keyring,
            'limit_pki' => $this->limit_pki,
            'limit_auth' => $this->limit_auth
        );
    }

}