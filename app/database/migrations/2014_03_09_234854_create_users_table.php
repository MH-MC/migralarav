<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('role_id')->unsigned();
			$table->string('username', 25)->unique();
			$table->string('password', 60);
			$table->string('lastname', 50);
			$table->string('firstname', 50);
			$table->string('email', 100)->unique();
			$table->string('phone', 45)->nullable();
			$table->string('cellphone', 45)->nullable();
			$table->enum('sex', array('M', 'F'));
			$table->tinyInteger('language')->unsigned();
			$table->tinyInteger('status')->unsigned();
			$table->integer('location_id')->nullable();
			$table->string('cr_key', 45)->nullable();
			$table->integer('book_promo')->default(NULL)->nullable();
			$table->tinyInteger('type')->default(1)->nullable();
			$table->integer('credits')->default(0);
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
		Schema::drop('users');
	}

}
