<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hash')->unsigned()->index('hash');
			$table->string('name')->nullable();
			$table->string('email')->unique();
			$table->string('username')->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password')->nullable();
			$table->boolean('block')->nullable()->default(0);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
