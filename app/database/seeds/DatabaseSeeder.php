<?php

class DatabaseSeeder extends Seeder {

	public function deleteTablesContent()
	{
        DB::table('roles')->delete();
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		self::deleteTablesContent();
		$this->call('RoleTableSeeder');
	}

}