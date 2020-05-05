<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->foreign('Ma_NV', 'cham_cong_ngay_ibfk_1')->references('id')->on('nhan_vien')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Thang_Hien_Tai', 'cham_cong_ngay_ibfk_2')->references('id')->on('cham_cong_thang')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		});
	}

}
