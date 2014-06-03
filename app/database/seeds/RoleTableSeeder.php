<?php

class RoleTableSeeder extends Seeder {

    public function run()
    {
    	$roles = array(
    		array('role_id' => 0, 'name' => 'superadmin'),
    		array('role_id' => 0, 'name' => 'miembro'),
    		array('role_id' => 0, 'name' => 'afiliado'),
    		array('role_id' => 1, 'name' => 'admin'),
    	);

    	foreach ($roles as $rol) 
    	{
	        Role::create($rol);
    	}
    }

}