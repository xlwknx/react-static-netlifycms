<?php

use Virgil\Helper\UUID;

class ApplicationTableSeeder extends Seeder {

    public function run()
    {

        DB::table('service_account_application')->delete();

        $applicationList = array(
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Mail (Outlook Add-In)',
                'application_description' => 'Virgil Mail (Outlook Add-In)',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Sync',
                'application_description' => 'Virgil Sync',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Pass (Chrome Extension)',
                'application_description' => 'Virgil Pass (Chrome Extension)',
                'application_url' => 'http://virgilsecurity.com',
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Pass (iOS)',
                'application_description' => 'Virgil Pass (iOS)',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Pass (Android)',
                'application_description' => 'Virgil Pass (Android)',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Pass (Windows Phone)',
                'application_description' => 'Virgil Pass (Windows Phone)',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Keys (Control Panel, Windows)',
                'application_description' => 'Virgil Keys (Control Panel, Windows)',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Private Keys',
                'application_description' => 'Virgil Private Keys Service',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Public Keys',
                'application_description' => 'Virgil Public Keys Service',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil Auth',
                'application_description' => 'Virgil Auth Service',
                'application_url' => 'http://virgilsecurity.com'
            ),
            array(
                'uuid' => UUID::generate(),
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'application_name' => 'Virgil CLI',
                'application_description' => 'Virgil CLI Application',
                'application_url' => 'http://virgilsecurity.com'
            )
        );

        $account = Account::find(AccountTableSeeder::VIRGIL_ACCOUNT_ID)->first();

        foreach($applicationList as $application) {
            $application['token'] = md5(
                implode(
                    '', $application
                )
            );
            Application::createApplication(
                $account,
                $application
            );
        }

    }
}