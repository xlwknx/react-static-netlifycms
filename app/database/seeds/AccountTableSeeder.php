<?php

class AccountTableSeeder extends Seeder {

    const VIRGIL_ACCOUNT_ID = 1;

    public function run()
    {
        DB::table('service_account')->delete();

        Account::create(array(
            'id' => self::VIRGIL_ACCOUNT_ID,
            'company_name' => 'Virgil Security',
            'email' => 'support@virgilsecurity.com',
            'password' => md5('password'),
            'confirmed' => Account::ACCOUNT_CONFIRMED
        ));
    }

}