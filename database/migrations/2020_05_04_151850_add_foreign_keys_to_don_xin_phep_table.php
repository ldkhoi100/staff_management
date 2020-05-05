<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDonXinPhepTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('don_xin_phep', function(Blueprint $table)
		{
			$table->foreign('MaNV', 'don_xin_phep_ibfk_1')->references('id')->on('nhan_vien')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('don_xin_phep', function(Blueprint $table)
		{
			$table->dropForeign('don_xin_phep_ibfk_1');
		});
	}

}
