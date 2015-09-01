<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiceAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('service_account', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('email', 36)->unique();
            $table->string('password', 36);
            $table->smallInteger('confirmed')->unsigned();
            $table->string('token')->nullable();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('service_account');
	}

}
