<?php

use Illuminate\Auth\UserInterface;

class Account extends Eloquent implements UserInterface {

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'account';

    /**
     * Create Account instance
     * @param array $parameters
     * @return Account
     */
    public static function create(array $parameters) {

        $account = new Account();
        $account->email = $parameters['email'];
        $account->password = $parameters['password'];

        $account->save();

        return $account;
    }

    /**
     * Account Password setter
     * @param $password
     */
    public function setPasswordAttribute($password) {

        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * One To Many relationship between Account and Application model
     * @return mixed
     */
    public function applications() {

        return $this->hasMany('Application');
    }

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