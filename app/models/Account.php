<?php

use Illuminate\Auth\UserInterface;

class Account extends Eloquent implements UserInterface {

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'account';

    /**
     * Get the unique identifier for the user.
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->id;
    }

    /**
     * Get the password for the user.*
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     * @return string
     */
    public function getRememberToken() {
        return '';
    }

    /**
     * Set the token value for the "remember me" session.
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value) {}

    /**
     * Get the column name for the "remember me" token.
     * @return string
     */
    public function getRememberTokenName() {
        return '';
    }

}