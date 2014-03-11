<?php

class Author extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'authors';

	/**
	 * Relationships
	 */
	public function audiobooks()
	{
		return $this->belongsToMany('Audiobook', 'audiobooks_authors');
	}
}