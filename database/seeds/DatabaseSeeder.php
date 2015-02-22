<?php

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
		Model::unguard();
		$this->call('TeamTableSeeder');
	}

}

class TeamTableSeeder extends Seeder {

	public function run() {

		for($i = 0; $i < 5; $i++) {

			$team = new Team;
			$team->name = 'Team '.$i;
			$team->code = 'Code '.$i;
			$team->save();

		}
	}
}
