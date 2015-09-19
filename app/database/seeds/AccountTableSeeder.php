<?php

class AccountTableSeeder extends Seeder {

    const VIRGIL_ACCOUNT_ID = 1;

    public function run()
    {
        DB::table('service_account')->delete();

        $account = new Account();
        $account->id = self::VIRGIL_ACCOUNT_ID;
        $account->email = 'support@virgilsecurity.com';
        $account->password = 'RW0tOs638RT50PZ';

        $account->save();
    }

}