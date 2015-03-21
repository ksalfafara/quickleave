<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Team;
use App\User;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		$this->call('QuickLeaveSeeder');
	}
}

class QuickLeaveSeeder extends Seeder {

	public function run() {

		// delete database data
		DB::table('users')->delete();
		DB::table('teams')->delete();

		$team = Team::create(array(
			'team_name' => 'admin',
			'team_code' => 'admin' 
			));

		User::create(array(
			'firstname' => 'admin',
			'lastname' => 'adminlastname',
			'username' => 'admin',
			'email' => 'admin@gmail.com',
			'password' => Hash::make('admin'),
			'sl_bal' => null,
			'vl_bal' => null,
			'role' => 'admin',
			'date_hired' => '2015-03-15',
			'team_id' => $team->id
		));

		for($i = 0; $i < 5; $i++) {
			$team = Team::create(array(
				'team_name' => 'team_name'.$i,
				'team_code' => 'team_code'.$i 
				));

			User::create(array(
				'firstname' => 'manager'.$i,
				'lastname' => 'managerlast'.$i,
				'username' => 'manager'.$i,
				'email' => 'manager'.$i.'@gmail.com',
				'password' => Hash::make('password'.$i),
				'sl_bal' => 10,
				'vl_bal' => 15,
				'role' => 'manager',
				'date_hired' => '2015-03-15',
				'team_id' => $team->id
				));

			User::create(array(
				'firstname' => 'firstname'.$i,
				'lastname' => 'lastname'.$i,
				'username' => 'username'.$i,
				'email' => 'email'.$i.'@gmail.com',
				'password' => Hash::make('password'.$i),
				'sl_bal' => 10,
				'vl_bal' => 15,
				'role' => 'member',	
				'date_hired' => '2015-03-15',
				'team_id' => $team->id
				));
		}

		
	}
}
