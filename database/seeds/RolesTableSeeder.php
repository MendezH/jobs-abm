<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder {

	public function run()
	{

		Role::create(array(
				'name' => 'Product Owner',
				'order' => 10
			));
		Role::create(array(
				'name' => 'Developer',
				'order' => 20
			));
		Role::create(array(
				'name' => 'Designer',
				'order' => 30
			));
	}
}