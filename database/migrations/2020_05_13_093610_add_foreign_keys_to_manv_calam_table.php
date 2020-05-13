<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToManvCalamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('manv_calam', function(Blueprint $table)
		{
			$table->foreign('MaNV', 'manv_calam_ibfk_1')->references('id')->on('nhan_vien')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Ca_Lam', 'manv_calam_ibfk_2')->references('id')->on('ca_lam')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('manv_calam', function(Blueprint $table)
		{
			$table->dropForeign('manv_calam_ibfk_1');
			$table->dropForeign('manv_calam_ibfk_2');
		});
	}

}
