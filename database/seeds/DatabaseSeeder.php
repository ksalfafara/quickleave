<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Team;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
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

		for($i = 0; $i < 5; $i++) {

			/*$team = new Team;
			$team->name = 'Team '.$i;
			$team->code = 'Code '.$i;
			$team->save();*/

			$team = Team::create(array(
				'name' => 'Team '.$i,
				'code' => 'Code '.$i, 
				));

			User::create(array(
				'firstname' => 'Firstname '.$i,
				'lastname' => 'Lastname '.$i,
				'username' => 'Username '.$i,
				'email' => 'Email'.$i.'@gmail.com',
				'password' => 'Password '.$i,
				'sl_bal' => 10,
				'vl_bal' => 15,
				'is_manager' => 'Manager/Employee'.$i,
				'teams_id' => $team->id
				));
		}
	}
}
