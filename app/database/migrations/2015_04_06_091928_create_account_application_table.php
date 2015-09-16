<?php

use Illuminate\Database\Migrations\Migration;

class CreateAccountApplicationTable extends Migration {

	public function up()
	{
        Schema::create('account_application', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('account_id')->unsigned();
            $table->string('uuid', 36);
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('url', 255)->nullable();
            $table->timestamps();

            $table->foreign('account_id')
                ->references('id')
                ->on('account')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index('account_id');
        });
	}

	public function down()
	{
        Schema::drop('account_application');
	}

}
