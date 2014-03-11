<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Foreign keys
		Schema::table('users', function($table)
		{
			$table->foreign('role_id', 'fk_users_role_id')
			      ->references('id')->on('roles')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
			// location_id
		});

		Schema::table('affiliates', function($table)
		{
			$table->foreign('user_id', 'fk_affiliates_user_id')
			      ->references('id')->on('users')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');

			$table->foreign('contract_id', 'fk_affiliates_contract_id')
			      ->references('id')->on('contracts')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');

			$table->foreign('account_id', 'fk_affiliates_account_id')
			      ->references('id')->on('accounts')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('accounts', function($table)
		{
			// location_id
		});

		Schema::table('contracts', function($table)
		{
			$table->foreign('affiliate_id', 'fk_contracts_affiliate_id')
			      ->references('id')->on('affiliates')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('contacts', function($table)
		{
			$table->foreign('affiliate_id', 'fk_contacts_affiliate_id')
			      ->references('id')->on('affiliates')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
			// location_id
		});

		Schema::table('profiles', function($table)
		{
			$table->foreign('affiliate_id', 'fk_profiles_affiliate_id')
			      ->references('id')->on('affiliates')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('audiobooks', function($table)
		{
			$table->foreign('affiliate_id', 'fk_audiobooks_affiliate_id')
			      ->references('id')->on('affiliates')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('wishlist', function($table)
		{
			$table->foreign('user_id', 'fk_wishlist_user_id')
			      ->references('id')->on('users')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');

			$table->foreign('audiobook_id', 'fk_wishlist_audiobook_id')
			      ->references('id')->on('audiobooks')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('audiobooks_authors', function($table)
		{
			$table->foreign('author_id', 'fk_audiobooks_authors_author_id')
			      ->references('id')->on('authors')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');

			$table->foreign('audiobook_id', 'fk_audiobooks_authors_audiobook_id')
			      ->references('id')->on('audiobooks')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('audiobooks_narrators', function($table)
		{
			$table->foreign('narrator_id', 'fk_audiobooks_narrators_narrator_id')
			      ->references('id')->on('narrators')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');

			$table->foreign('audiobook_id', 'fk_audiobooks_narrators_audiobook_id')
			      ->references('id')->on('audiobooks')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('audiobooks_categories', function($table)
		{
			$table->foreign('category_id', 'fk_audiobooks_categories_category_id')
			      ->references('id')->on('categories')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');

			$table->foreign('audiobook_id', 'fk_audiobooks_categories_audiobook_id')
			      ->references('id')->on('audiobooks')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('audiobooks_affiliates', function($table)
		{
			$table->foreign('affiliate_id', 'fk_audiobooks_affiliates_affiliate_id')
			      ->references('id')->on('affiliates')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');

			$table->foreign('audiobook_id', 'fk_audiobooks_affiliates_audiobook_id')
			      ->references('id')->on('audiobooks')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

		Schema::table('audiobooks_parts', function($table)
		{
			$table->foreign('audiobook_id', 'fk_audiobooks_parts_audiobook_id')
			      ->references('id')->on('audiobooks')
			      ->onDelete('NO ACTION')
			      ->onUpdate('NO ACTION');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->dropForeign('fk_users_role_id');
			// location_id
		});

		Schema::table('affiliates', function($table)
		{
			$table->dropForeign('fk_affiliates_user_id');
			$table->dropForeign('fk_affiliates_contract_id');
			$table->dropForeign('fk_affiliates_account_id');
		});

		Schema::table('accounts', function($table)
		{
			// location_id
		});

		Schema::table('contracts', function($table)
		{
			$table->dropForeign('fk_contracts_affiliate_id');
		});

		Schema::table('contacts', function($table)
		{
			$table->dropForeign('fk_contacts_affiliate_id');
			// location_id
		});

		Schema::table('profiles', function($table)
		{
			$table->dropForeign('fk_profiles_affiliate_id');
		});

		Schema::table('audiobooks', function($table)
		{
			$table->dropForeign('fk_audiobooks_affiliate_id');
		});

		Schema::table('wishlist', function($table)
		{
			$table->dropForeign('fk_wishlist_user_id');
			$table->dropForeign('fk_wishlist_audiobook_id');
		});

		Schema::table('audiobooks_authors', function($table)
		{
			$table->dropForeign('fk_audiobooks_authors_author_id');
			$table->dropForeign('fk_audiobooks_authors_audiobook_id');
		});

		Schema::table('audiobooks_narrators', function($table)
		{
			$table->dropForeign('fk_audiobooks_narrators_narrator_id');
			$table->dropForeign('fk_audiobooks_narrators_audiobook_id');
		});

		Schema::table('audiobooks_categories', function($table)
		{
			$table->dropForeign('fk_audiobooks_categories_category_id');
			$table->dropForeign('fk_audiobooks_categories_audiobook_id');
		});

		Schema::table('audiobooks_affiliates', function($table)
		{
			$table->dropForeign('fk_audiobooks_affiliates_affiliate_id');
			$table->dropForeign('fk_audiobooks_affiliates_audiobook_id');
		});

		Schema::table('audiobooks_parts', function($table)
		{
			$table->dropForeign('fk_audiobooks_parts_audiobook_id');
		});
	}

}
