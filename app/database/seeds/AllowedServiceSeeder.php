<?php

class AllowedServiceSeeder extends Seeder {

    public function run()
    {

        AllowedService::create(array(
            'id' => 1,
            'service' => 'keyring'
        ));

        AllowedService::create(array(
            'id' => 2,
            'service' => 'pki'
        ));

        AllowedService::create(array(
            'id' => 3,
            'service' => 'auth'
        ));
    }
}