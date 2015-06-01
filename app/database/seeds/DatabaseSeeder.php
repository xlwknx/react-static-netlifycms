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

        $this->call('AccountTableSeeder');
        $this->command->info('Account table seeded!');

        $this->call('ApplicationTableSeeder');
        $this->command->info('Application table seeded!');

    }
}
