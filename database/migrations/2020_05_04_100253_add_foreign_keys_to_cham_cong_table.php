<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChamCongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cham_cong', function(Blueprint $table)
		{
			$table->foreign('Ma_NV', 'cham_cong_ibfk_1')->references('id')->on('nhan_vien')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cham_cong', function(Blueprint $table)
		{
			$table->dropForeign('cham_cong_ibfk_1');
		});
	}

}
