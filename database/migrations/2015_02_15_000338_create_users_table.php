<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{

		Schema::create('teams', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('password',60);
			$table->string('remember_token',100)->nullable();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('email');
			$table->string('phone');
			$table->integer('sl_bal');
			$table->integer('vl_bal');
			$table->boolean('isManager');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::create('leave_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create('requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('from_date');
			$table->date('to_date');
			$table->integer('duration');
			$table->string('reason');
			$table->string('manager_remark');
			$table->string('status');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('leave_types_id')->unsigned();
			$table->foreign('leave_types_id')->references('id')->on('leave_types')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('teams');
		Schema::drop('users');
		Schema::drop('leave_types');
		Schema::drop('requests');

	}

}

	/* // FIRST ATTEMPT
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->string('email')->unique();
			$table->string('name');
			$table->timestamps();
			//$table->rememberToken();
			//$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
	*/