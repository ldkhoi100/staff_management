<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhongBanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phong_ban', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('Ma_PB');
			$table->string('Ten_PB');
			$table->integer('STD_Phong_Ban');
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
		Schema::drop('phong_ban');
	}

}
