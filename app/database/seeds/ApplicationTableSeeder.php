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
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Sync',
                'description' => 'Virgil Sync',
                'url' => 'http://virgilsecurity.com',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Chrome Extension)',
                'description' => 'Virgil Pass (Chrome Extension)',
                'url' => 'http://virgilsecurity.com',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (iOS)',
                'description' => 'Virgil Pass (iOS)',
                'url' => 'http://virgilsecurity.com',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Android)',
                'description' => 'Virgil Pass (Android)',
                'url' => 'http://virgilsecurity.com',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Windows Phone)',
                'description' => 'Virgil Pass (Windows Phone)',
                'url' => 'http://virgilsecurity.com',
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Keys (Control Panel, Windows)',
                'description' => 'Virgil Keys (Control Panel, Windows)',
                'url' => 'http://virgilsecurity.com',
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