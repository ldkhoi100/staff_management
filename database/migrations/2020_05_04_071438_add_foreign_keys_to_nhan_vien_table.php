<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNhanVienTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nhan_vien', function(Blueprint $table)
		{
			$table->foreign('MaCV', 'nhan_vien_ibfk_1')->references('id')->on('chuc_vu')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Ma_Luong', 'nhan_vien_ibfk_2')->references('id')->on('luong')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Ma_PB', 'nhan_vien_ibfk_4')->references('id')->on('phong_ban')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Ma_TDHV', 'nhan_vien_ibfk_5')->references('id')->on('trinh_do_hoc_van')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id', 'nhan_vien_ibfk_6')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nhan_vien', function(Blueprint $table)
		{
			$table->dropForeign('nhan_vien_ibfk_1');
			$table->dropForeign('nhan_vien_ibfk_2');
			$table->dropForeign('nhan_vien_ibfk_4');
			$table->dropForeign('nhan_vien_ibfk_5');
			$table->dropForeign('nhan_vien_ibfk_6');
		});
	}

}
