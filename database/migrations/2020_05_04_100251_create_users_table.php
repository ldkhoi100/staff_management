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
			$table->integer('id', true);
			$table->string('name')->nullable();
			$table->string('email')->unique();
			$table->string('username')->nullable()->unique();
			$table->bigInteger('phone')->nullable()->unique();
			$table->string('address')->nullable();
			$table->string('image', 500)->nullable();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password')->nullable();
			$table->boolean('block')->default(0);
			$table->string('remember_token', 100)->nullable();
			$table->string('provider')->nullable();
			$table->string('provider_id')->nullable();
			$table->timestamps();
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
