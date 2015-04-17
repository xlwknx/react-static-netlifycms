<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiceApplicationStatisticTable extends Migration {

    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('service_application_statistic', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('account_id')->unsigned();
            $table->bigInteger('application_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->string('url', 255);
            $table->timestamps();

            $table->foreign('account_id')
                ->references('id')
                ->on('service_account')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('application_id')
                ->references('id')
                ->on('service_application')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('service_id')
                ->references('id')
                ->on('service_allowed_service')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index('account_id');
            $table->index('application_id');
            $table->index('service_id');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('service_account_statistic');
	}

}
