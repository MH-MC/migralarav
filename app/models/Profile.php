<?php

class Profile extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profiles';

	/**
	 * Relationships
	 */
	public function affiliate()
	{
		return $this->belongsTo('Affiliate');
	}
}