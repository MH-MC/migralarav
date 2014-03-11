<?php

class Contract extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contracts';

	/**
	 * Relationships
	 */
	public function affiliate()
	{
		return $this->belongsTo('Affiliate');
	}
}