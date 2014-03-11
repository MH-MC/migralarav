<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('affiliate_id')->unsigned();
			$table->integer('category')->unsigned();
			$table->boolean('contact_member')->default(false);
			$table->boolean('create_activities')->default(false);
			$table->boolean('update_audiobooks')->default(false);
			$table->boolean('update_authors')->default(false);
			$table->boolean('update_activities')->default(false);
			$table->boolean('new_releases')->default(false);
			$table->boolean('content_news')->default(false);
			$table->boolean('content_pod')->default(false);
			$table->boolean('activities_mh')->default(false);
			$table->boolean('activities_members')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
