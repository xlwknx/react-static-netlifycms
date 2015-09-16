<?php

use Illuminate\Database\Migrations\Migration;

class CreateApplicationLogTable extends Migration {

    public function up()
	{
        Schema::create('application_log', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('token_id')->unsigned();
            $table->string('resource', 255);
            $table->timestamps();

            $table->foreign('token_id')
                ->references('id')
                ->on('application_token')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index('service_id');
            $table->index('token_id');
        });
    }

	public function down()
	{
        Schema::drop('application_log');
	}
}
