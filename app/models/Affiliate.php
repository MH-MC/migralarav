<?php

class Affiliate extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'affiliates';

	/**
	 * Relationships
	 */
	public function audiobooks()
	{
		return $this->hasMany('Audiobook');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function accounts()
	{
		return $this->hasMany('Account');
	}

	public function contacts()
	{
		return $this->hasMany('Contact');
	}

	public function contracts()
	{
		return $this->hasMany('Contract');
	}

	public function profile()
	{
		return $this->hasOne('Profile');
	}
}