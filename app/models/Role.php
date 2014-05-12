<?php

class Role extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';
	public $timestamps = false;

	/**
	 * Relationships
	 */
	public function users()
	{
		return $this->hasMany('User');
	}
}