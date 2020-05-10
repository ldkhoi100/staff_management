<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBacLuongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bac_luong', function(Blueprint $table)
		{
			$table->foreign('LuongCB', 'bac_luong_ibfk_1')->references('id')->on('luong_co_ban')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bac_luong', function(Blueprint $table)
		{
			$table->dropForeign('bac_luong_ibfk_1');
		});
	}

}
