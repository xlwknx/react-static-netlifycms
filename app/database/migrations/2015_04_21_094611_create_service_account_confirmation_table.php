<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiceAccountConfirmationTable extends Migration {

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('service_account_confirmation', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('account_id')->unsigned();
            $table->string('code', 6);
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
        Schema::drop('service_account_confirmation');
	}

}
