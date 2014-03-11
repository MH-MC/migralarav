<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('affiliates', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('position', 100);
			$table->string('company_name', 100);
			$table->string('website', 100);
			$table->string('address', 150);
			$table->text('description')->default("");
			$table->tinyInteger('audiobook_language')->unsigned()->default(0);
			$table->tinyInteger('audiobook_buss_language')->unsigned()->default(0);
			$table->tinyInteger('audiobook_fut_language')->unsigned()->default(0);
			$table->tinyInteger('audiobook_works_language')->unsigned()->default(0);
			$table->boolean('producer')->default(false);
			$table->integer('contract_id')->unsigned()->nullable();
			$table->integer('account_id')->unsigned()->nullable();
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
		Schema::drop('affiliates');
	}

}
