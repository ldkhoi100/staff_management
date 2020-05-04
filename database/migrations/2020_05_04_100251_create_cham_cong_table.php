<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChamCongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cham_cong', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('Ma_NV')->index('Ma_NV');
			$table->integer('Thang_Hien_Tai');
			$table->integer('So_Cong');
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
		Schema::drop('cham_cong');
	}

}
