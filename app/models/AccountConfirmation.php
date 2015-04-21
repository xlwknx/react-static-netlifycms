<?php

class AccountConfirmation extends Eloquent {

    /**
     * The length of human-readable code
     */
    const HUMAN_READABLE_CODE_LENGTH = 6;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_account_confirmation';

    /**
     * Create new Confirmation instance
     *
     * @param Account $account
     * @return AccountConfirmation
     */
    public static function createConfirmation(Account $account) {

        $confirmation = new AccountConfirmation();
        $confirmation->account_id = $account->id;
        $confirmation->code = self::generateConfirmationCode();

        $confirmation->save();

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
        } while (\AccountConfirmation::whereCode($code)->first());

        return $code;
    }
} 