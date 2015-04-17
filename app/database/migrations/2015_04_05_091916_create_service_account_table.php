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
            $table->string('username', 36)->unique();
            $table->string('password', 36);
            $table->bigInteger('type_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('service_account_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index('type_id');

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
