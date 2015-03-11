<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersFk extends Migration {

	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->integer('team_id')->unsigned()->nullable();
			$table->foreign('team_id')->references('id')->on('teams')
				->onUpdate('cascade')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->dropForeign('users_team_id_foreign');
			$table->dropColumn('team_id');
		});
	}

}
