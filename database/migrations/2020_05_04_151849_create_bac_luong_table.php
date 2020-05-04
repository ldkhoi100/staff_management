<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBacLuongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bac_luong', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('LuongCB')->index('LuongCB');
			$table->integer('Bac_Luong')->unique('Bac_Luong');
			$table->integer('HS_Luong');
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
		Schema::drop('bac_luong');
	}

}
