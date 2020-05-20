<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChamCongNgayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cham_cong_ngay', function(Blueprint $table)
		{
			$table->foreign('LuongCB', 'cham_cong_ngay_ibfk_3')->references('id')->on('luong_co_ban')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('MaNV', 'cham_cong_ngay_ibfk_4')->references('id')->on('nhan_vien')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cham_cong_ngay', function(Blueprint $table)
		{
			$table->dropForeign('cham_cong_ngay_ibfk_3');
			$table->dropForeign('cham_cong_ngay_ibfk_4');
		});
	}

}
