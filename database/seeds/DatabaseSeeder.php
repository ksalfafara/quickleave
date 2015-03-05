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
//		$this->call('UserTableSeeder');
		$this->command->info('Done seeding.');
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
				'username' => 'Username'.$i,
				'email' => 'Email'.$i.'@gmail.com',
				'password' => Hash::make('Password'.$i),
				'sl_bal' => 10,
				'vl_bal' => 15,
				'is_manager' => 'Manager/Employee'.$i,
				'team_id' => $team->id
				));
		}

		$team = Team::create(array(
			'name'	=> 'Team2',
			'code'	=>	'code2'
			));

		User::create(array(
			'firstname'	=> 'Elaine',
			'lastname'	=> 'Lee',
			'username'	=> 'elaine',
			'email'		=> 'elainelee@yahoo.com',
			'password'	=>  Hash::make('elaine'),
			'sl_bal' => 10,
			'vl_bal' => 15,
			'is_manager' => '0',
			'team_id'	=> $team->id
			));

	}
}


 class UserTableSeeder extends Seeder { 

	public function run() {
		// clearing db -lee
		DB::table('users')->delete();
		DB::table('teams')->delete();
//		DB::table('leaves')->delete();

		//seed db tables -lee
		//seed users table

		$team = Team::create(array(
			'name'	=> 'Team1',
			'code'	=>	'code1'
			));

		User::create(array(
			'firstname'	=> 'Jennifer',
			'lastname'	=> 'Lawrence',
			'username'	=> 'jlaw',
			'email'		=> 'jlaw@yahoo.com',
			'password'	=>  Hash::make('lovely'),
			'team_id'	=> $team->id
			));

		
		

		//seed leaves table 
/**		Leave::create(array(
			'type'		=> 'SL',
			'from_dt'	=>	'2014-02-28',
			'to_dt'		=>	'2014-02-29',
			'note'		=>	'vertigo'
	));
**/
		}
	}

