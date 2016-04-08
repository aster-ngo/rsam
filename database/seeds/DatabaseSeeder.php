<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Model::unguard();

		 $this->call('UserTableSeeder');
		// $this->call('RoleTableSeeder');
	}

}

class UserTableSeeder extends Seeder {
	
	public function run()
	{
		User::create([
				'name' => 'admin',
				'email' => "admin@gmail.com",
				'password' => bcrypt("123456"),
				'role' => 4
			]);
	}

}

class RoleTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('rolers')->insert([
			array('id'=>1, 'permission'=>'user'),
			array('id'=>2, 'permission'=>'manager'),
			array('id'=>3, 'permission'=>'manager database'),
			array('id'=>4, 'permission'=>'manager system')
		]);
	}

}
