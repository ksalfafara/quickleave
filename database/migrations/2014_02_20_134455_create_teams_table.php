<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration {

	public function up()
	{
		Schema::create('teams', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('manager_id')->unsigned();
			$table->foreign('manager_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

			$table->string('team_name')->unique();
			$table->string('team_code', 60)->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('teams');
		Schema::table('teams', function($table)
		{
			$table->dropForeign('teams_manager_id_foreign');
			$table->dropColumn('manager_id');
		});
	}

}
	