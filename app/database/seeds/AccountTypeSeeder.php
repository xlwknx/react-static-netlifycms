<?php

class AccountTypeSeeder extends Seeder {

    public function run()
    {
        foreach(AccountType::get() as $type) {
            AccountType::create(
                $type
            );
        }
    }
} 