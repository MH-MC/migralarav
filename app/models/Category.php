<?php

class Category extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * Relationships
	 */
	public function audiobooks()
	{
		return $this->belongsToMany('Audiobook', 'audiobooks_categories');
	}
}