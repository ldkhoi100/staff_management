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
			$table->foreign('MaCV', 'nhan_vien_ibfk_3')->references('id')->on('chuc_vu')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id', 'nhan_vien_ibfk_4')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Ca_Lam', 'nhan_vien_ibfk_5')->references('id')->on('ca_lam')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
			$table->dropForeign('nhan_vien_ibfk_3');
			$table->dropForeign('nhan_vien_ibfk_4');
			$table->dropForeign('nhan_vien_ibfk_5');
		});
	}

}
