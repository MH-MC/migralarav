<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiobooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('audiobooks', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('affiliate_id')->unsigned();
			$table->string('title', 150);
			$table->string('title_abr', 50)->nullable();
			$table->boolean('abridged')->default(false);
			$table->tinyInteger('language')->unsigned();
			$table->integer('length')->unsigned()->nullable();
			$table->decimal('price', 4, 2)->nullable();
			$table->integer('credits')->nullable();
			$table->string('bank', 100)->nullable();
			$table->text('review')->nullable();
			$table->text('description')->nullable();
			$table->text('producer_description')->nullable();
			$table->string('isbn', 80)->nullable();
			$table->tinyInteger('drm')->unsigned();
			$table->timestamp('date_book');
			$table->timestamp('date_audio');
			$table->boolean('exist_audio')->default(false);
			$table->boolean('exist_film')->default(false);
			$table->boolean('copyrights')->default(false);
			$table->boolean('universal')->default(false);
			$table->string('sites', 200)->nullable();
			$table->text('comments')->nullable();
			$table->tinyInteger('status')->unsigned()->default(0);
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
		Schema::drop('audiobooks');
	}

}
