<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLuongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('luong', function(Blueprint $table)
		{
			$table->foreign('LuongCB', 'luong_ibfk_1')->references('id')->on('luong_co_ban')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('luong', function(Blueprint $table)
		{
			$table->dropForeign('luong_ibfk_1');
		});
	}

}
