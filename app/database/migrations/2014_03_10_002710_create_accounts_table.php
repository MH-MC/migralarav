<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('name', 100);
			$table->tinyInteger('type')->unsigned()->default(0);
			$table->string('number', 60)->nullable();
			$table->string('swift', 100)->nullable();
			$table->string('bank', 100)->nullable();
			$table->string('address', 100)->nullable();
			$table->string('phone', 100)->nullable();
			$table->string('email', 100);
			$table->integer('location_id')->unsigned()->nullable();
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
		Schema::drop('accounts');
	}

}
