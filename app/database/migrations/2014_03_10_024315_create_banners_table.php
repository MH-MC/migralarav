<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('description', 100);
			$table->integer('order')->unsigned()->nullable()->default(0);
			$table->tinyInteger('type')->unsigned();
			$table->string('image', 100)->nullable();
			$table->string('link', 100)->nullable();
			$table->string('audio_video', 100)->nullable();
			$table->string('image_reprod', 100)->nullable();
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
		Schema::drop('banners');
	}

}
