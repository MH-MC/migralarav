<?php

class Audiobook extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'audiobooks';

	/**
	 * Relationships
	 */
	// WARNING: wishlist
	public function users()
	{
		return $this->belongsToMany('User', 'wishlist');
	}

	public function narrators()
	{
		return $this->belongsToMany('Narrator', 'audiobooks_narrators');
	}

	public function authors()
	{
		return $this->belongsToMany('Author', 'audiobooks_authors');
	}

	public function categories()
	{
		return $this->belongsToMany('Category', 'audiobooks_categories');
	}

	public function parts()
	{
		return $this->hasMany('Audiobook_Part');
	}
}