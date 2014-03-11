<?php

class Contact extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contacts';

	/**
	 * Relationships
	 */
	public function affiliate()
	{
		return $this->belongsTo('Affiliate');
	}
}