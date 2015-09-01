<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiceAccountApplicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('service_account_application', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('account_id')->unsigned();
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('url', 255)->nullable();
            $table->string('token', 64);
            $table->string('uuid', 36);
            $table->timestamps();

            $table->foreign('account_id')
                ->references('id')
                ->on('service_account')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index('account_id');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('service_account_application');
	}

}
