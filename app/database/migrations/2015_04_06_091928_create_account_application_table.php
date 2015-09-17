<?php

use Illuminate\Database\Migrations\Migration;

class CreateAccountApplicationTable extends Migration {

    const APPLICATION_INACTIVE = 0;
    const APPLICATION_ACTIVE   = 1;

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
            $table->smallInteger('active')->default(
                self::APPLICATION_ACTIVE
            );
            $table->softDeletes();
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
