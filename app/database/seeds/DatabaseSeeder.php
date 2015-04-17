<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('AccountTypeSeeder');
        $this->command->info('Account Type seeded!');

        $this->call('AllowedServiceSeeder');
        $this->command->info('Allowed Service seeded!');

    }

}
