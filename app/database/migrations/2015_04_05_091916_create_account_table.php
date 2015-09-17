<?php

use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

	public function up()
	{
        Schema::create('account', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->string('email', 36)->unique();
            $table->string('password', 255);
            $table->string('confirmation_code', 6)->nullable();
            $table->timestamp('last_login');
            $table->softDeletes();
            $table->timestamps();
        });
	}

	public function down()
	{
        Schema::drop('account');
	}

}
