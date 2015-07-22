<?php

class ApplicationTableSeeder extends Seeder {

    public function run()
    {

        DB::table('service_account_application')->delete();

        $applicationList = array(
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Mail (Outlook Add-In)',
                'description' => 'Virgil Mail (Outlook Add-In)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'mail',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Sync',
                'description' => 'Virgil Sync',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'sync',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Chrome Extension)',
                'description' => 'Virgil Pass (Chrome Extension)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'pass',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (iOS)',
                'description' => 'Virgil Pass (iOS)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'ios',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Android)',
                'description' => 'Virgil Pass (Android)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'android',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Windows Phone)',
                'description' => 'Virgil Pass (Windows Phone)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'windows',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Keys (Control Panel, Windows)',
                'description' => 'Virgil Keys (Control Panel, Windows)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'panel',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Private Keys',
                'description' => 'Virgil Private Keys Service',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'keyring',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Public Keys',
                'description' => 'Virgil Public Keys Service',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'keys',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Auth',
                'description' => 'Virgil Auth Service',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'auth',
            )
        );

        foreach($applicationList as $application) {
            $application['token'] = md5(
                implode(
                    '', $application
                )
            );
            Application::create(
                $application
            );
        }

    }
}