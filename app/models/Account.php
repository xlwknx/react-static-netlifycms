<?php

use Authentication as AuthenticationModel,
    Application as ApplicationModel,
    Account as AccountModel,

    Virgil\Helper\UUID,
    Virgil\Helper\User;

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
        $account->password     = User::generateUserPassword($password);
        $account->confirmed    = self::ACCOUNT_CONFIRMED;

        $account->save();

        return $account;
    }

    /**
     * Get Account by Account Email and Account Password
     *
     * @param $email
     * @param $password
     * @return Account
     */
    public static function getAccountByEmailAndPassword($email, $password) {

        return AccountModel::whereEmail(
            $email
        )->wherePassword(
            User::generateUserPassword($password)
        )->first();
    }

    /**
     * Get Account by Account Email
     *
     * @param $email
     * @return Account
     */
    public static function getAccountByEmail($email) {

        return AccountModel::whereEmail(
            $email
        )->first();
    }

    /**
     * Get Account by Account Reset token
     *
     * @param $token
     * @return mixed
     */
    public static function getAccountByToken($token) {

        return AccountModel::whereToken(
            $token
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
     * Is Reset Account password action is still in progress
     *
     * @return bool
     */
    public function isResetPasswordInProgress() {

        return !empty($this->token) ? true : false;
    }

    /**
     * Get Account Application list
     *
     * @return mixed
     */
    public function getApplicationList() {

        return ApplicationModel::getApplicationList(
            $this
        );
    }

    /**
     * Get Account Application
     *
     * @param $applicationId
     * @return Application
     */
    public function getApplication($applicationId) {

        return ApplicationModel::getApplication(
            $this,
            $applicationId
        );
    }

    /**
     * Create new Account Application
     *
     * @param $parameters
     * @return mixed
     */
    public function createApplication($parameters) {

        return ApplicationModel::createApplication(
            $this,
            $parameters
        );
    }

    /**
     * Reset Account password and send 'reset-password' email
     *
     * @return bool
     */
    public function resetPassword() {


        $this->token = User::generateResetToken();
        $this->save();

        $account = $this;
        Mail::send(
            'email.reset-password',
            array('resetToken' => $account->token),
            function($message) use ($account) {
                $message->to(
                    $account->email,
                    $account->email
                )->subject('Virgil Security Reset Password');
            }
        );

        return true;
    }

    /**
     * Update Account with new password
     *
     * @param $password
     * @return bool
     */
    public function updatePassword($password) {

        $this->token    = null;
        $this->password = User::generateUserPassword(
            $password
        );

        $this->save();

        return true;
    }
}