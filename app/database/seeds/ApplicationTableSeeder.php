<?php

class ApplicationTableSeeder extends Seeder {

    protected $env = 'production';

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
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Sync',
                'description' => 'Virgil Sync',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'sync',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Chrome Extension)',
                'description' => 'Virgil Pass (Chrome Extension)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'pass',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (iOS)',
                'description' => 'Virgil Pass (iOS)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'ios',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Android)',
                'description' => 'Virgil Pass (Android)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'android',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Pass (Windows Phone)',
                'description' => 'Virgil Pass (Windows Phone)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'windows',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Keys (Control Panel, Windows)',
                'description' => 'Virgil Keys (Control Panel, Windows)',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'panel',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Private Keys',
                'description' => 'Virgil Private Keys Service',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'keyring',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ),
            array(
                'account_id' => AccountTableSeeder::VIRGIL_ACCOUNT_ID,
                'name' => 'Virgil Public Keys',
                'description' => 'Virgil Public Keys Service',
                'url' => 'http://virgilsecurity.com',
                'alias' => 'keys',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );

        foreach($applicationList as $application) {

            $application['token'] = md5(
                implode(
                    '',
                    array_merge(
                        array(
                            $this->env
                        ),
                        $application
                    )
                )
            );
            Application::create(
                $application
            );
        }

    }
}