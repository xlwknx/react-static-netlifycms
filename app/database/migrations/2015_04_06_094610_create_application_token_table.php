<?php

use Illuminate\Database\Migrations\Migration;

class CreateApplicationTokenTable extends Migration {

    const TOKEN_INACTIVE = 0;
    const TOKEN_ACTIVE   = 1;

	public function up()
	{
        Schema::create('application_token', function($table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('application_id')->unsigned();
            $table->string('token', 255);
            $table->smallInteger('active')->default(
                self::TOKEN_ACTIVE
            );
            $table->timestamp('valid_through');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('application_id')
                ->references('id')
                ->on('account_application')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index('application_id');
        });
	}

	public function down()
	{
        Schema::drop('application_token');
	}

}
