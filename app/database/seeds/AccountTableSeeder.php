<?php

class AccountTableSeeder extends Seeder {

    const VIRGIL_ACCOUNT_ID = 1;

    public function run()
    {
        DB::table('service_account')->delete();

        Account::create(array(
            'id'        => self::VIRGIL_ACCOUNT_ID,
            'email'     => 'support@virgilsecurity.com',
            'password'  => md5('RW0tOs638RT50PZ'),
            'domain'    => 'com.virgilsecurity',
            'confirmed' => Account::ACCOUNT_CONFIRMED
        ));
    }

}