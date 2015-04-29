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
                'name' => 'Unlimited',
                'limit_application' => 99999999999,
                'limit_keyring' => 99999999999,
                'limit_pki' => 99999999999,
                'limit_auth' => 99999999999
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