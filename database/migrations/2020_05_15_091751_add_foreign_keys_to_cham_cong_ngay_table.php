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
			$table->foreign('Ca_Lam', 'cham_cong_ngay_ibfk_1')->references('id')->on('ca_lam')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('MaNV', 'cham_cong_ngay_ibfk_2')->references('id')->on('nhan_vien')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('LuongCB', 'cham_cong_ngay_ibfk_3')->references('id')->on('luong_co_ban')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('cham_cong_ngay_ibfk_1');
			$table->dropForeign('cham_cong_ngay_ibfk_2');
			$table->dropForeign('cham_cong_ngay_ibfk_3');
		});
	}

}
