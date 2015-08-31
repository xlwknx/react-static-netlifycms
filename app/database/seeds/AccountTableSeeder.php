<?php

class AccountTableSeeder extends Seeder {

    const VIRGIL_ACCOUNT_ID = 1;

    public function run()
    {
        DB::table('service_account')->delete();

        Account::create(array(
            'id'        => self::VIRGIL_ACCOUNT_ID,
            'email'     => 'support@virgilsecurity.com',
            'password'  => md5('password'),
            'uuid'      => '007a13bb-7263-0b32-2325-e9587f554a68',
            'confirmed' => Account::ACCOUNT_CONFIRMED
        ));
    }

}