<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiobooksAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('audiobooks_authors', function($table)
		{
			$table->integer('audiobook_id')->unsigned();
			$table->integer('author_id')->unsigned();
			$table->tinyInteger('main')->unsigned();
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
		Schema::drop('audiobooks_authors');
	}

}
