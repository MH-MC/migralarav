<?php

class Narrator extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'narrators';

	/**
	 * Relationships
	 */
	public function audiobooks()
	{
		return $this->belongsToMany('Audiobook', 'audiobooks_narrators');
	}
}