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
		$this->call('TeamTableSeeder');
//		$this->call('UserTableSeeder');
		$this->command->info('Done seeding.');
	}
}

/*	class TeamTableSeeder extends Seeder {

	public function run() {

		for($i = 0; $i < 5; $i++) {

			$team = new Team;
			$team->name = 'Team '.$i;
			$team->code = 'Code '.$i;
			$team->save();
		}
	}
}
*/




















/** class UserTableSeeder extends Seeder { --- do not remove yet, might still be needed

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
			'password'	=> '123456',
			'teams_id'	=> $team->id
			));

		//seed leaves table 
		Leave::create(array(
			'type'		=> 'SL',
			'from_dt'	=>	'2014-02-28',
			'to_dt'		=>	'2014-02-29',
			'note'		=>	'vertigo'
	));
		}
	}
**/
