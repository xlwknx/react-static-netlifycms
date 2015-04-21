<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiceAccountTypeTable extends Migration {

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('service_account_type', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('name', 255);
            $table->smallInteger('limit_application')->unsigned();
            $table->bigInteger('limit_keyring')->unsigned();
            $table->bigInteger('limit_pki')->unsigned();
            $table->bigInteger('limit_auth')->unsigned();
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
        Schema::drop('service_account_type');
	}

}
