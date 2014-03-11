<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiobooksNarratorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('audiobooks_narrators', function($table)
		{
			$table->integer('audiobook_id')->unsigned();
			$table->integer('narrator_id')->unsigned();
			$table->text('bio')->nullable();
			$table->string('image', 100)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('audiobooks_narrators');
	}

}
