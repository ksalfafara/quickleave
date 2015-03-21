<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('team_id')->unsigned()->nullable();
			$table->foreign('team_id')->references('id')->on('teams')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->string('username')->unique();
			$table->string('password', 60);
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email')->unique();
			$table->integer('sl_bal')->default(10)->nullable();
			$table->integer('vl_bal')->default(15)->nullable();
			$table->string('role')->default('member')->nullable();		
			$table->date('date_hired');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
		Schema::table('users', function($table)
		{
			$table->dropForeign('users_team_id_foreign');
			$table->dropColumn('team_id');
		});
	}

}
