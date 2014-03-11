<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contracts', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('affiliate_id')->unsigned();
			$table->string('title', 50);
			$table->tinyInteger('order')->unsigned();
			$table->text('description');
			$table->tinyInteger('language')->unsigned();
			$table->timestamps();
		});

		Schema::create('contacts', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('affiliate_id')->unsigned();
			$table->string('lastname', 50);
			$table->string('firstname', 50);
			$table->string('position', 100);
			$table->string('email', 60);
			$table->string('phone', 45)->nullable();
			$table->string('cellphone', 45)->nullable();
			$table->integer('location_id')->unsigned()->nullable();
			$table->string('address', 150)->nullable();
			$table->string('reason', 200)->nullable();
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
		Schema::drop('contracts');
		Schema::drop('contacts');
	}

}
