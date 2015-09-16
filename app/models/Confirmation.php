<?php

class Confirmation extends Eloquent {

    /**
     * Auth token life time in minutes
     */
    const VERIFICATION_TOKEN_LIFETIME = 60;

    /**
     * The length of human-readable code
     */
    const HUMAN_READABLE_CODE_LENGTH = 6;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'account_confirmation';

    /**
     * Create new Confirmation instance
     *
     * @param Account $account
     * @return Confirmation
     */
    public static function createConfirmation(Account $account) {

        self::deleteConfirmation(
            $account
        );

        $confirmation = new Confirmation();
        $confirmation->account_id = $account->id;
        $confirmation->code = self::generateConfirmationCode();

        $confirmation->save();

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

        return $confirmation;
    }

    /**
     * Generate Account confirmation code
     *
     * @return string
     */
    public static function generateConfirmationCode() {

        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';

        do {
            $code = '';
            for ($i = 0; $i < self::HUMAN_READABLE_CODE_LENGTH; $i++) {
                $charset = $i % 2 ? $digits : $letters;
                $code .= $charset[rand(0, strlen($charset) - 1)];
            }
        } while (\Confirmation::whereCode($code)->first());

        return $code;
    }

    /**
     * Confirm Account
     *
     * @return $this
     */
    public function confirmAccount() {

        $account = $this->account;

        $account->confirmed = Account::ACCOUNT_CONFIRMED;
        $account->save();

        self::deleteConfirmation(
            $account
        );

        return $this;
    }

    /**
     * Delete an old confirmation instance
     *
     * @param $account - account
     * @return bool
     */
    public static function deleteConfirmation(Account $account)
    {
        \Confirmation::whereAccountId(
            $account->id
        )->delete();

        return true;
    }

    /**
     * Get Account relation instance
     *
     * @return mixed
     */
    public function account() {

        return $this->belongsTo('Account');
    }
} 