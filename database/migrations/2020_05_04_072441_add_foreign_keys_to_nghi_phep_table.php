<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNghiPhepTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nghi_phep', function(Blueprint $table)
		{
			$table->foreign('MaNV', 'nghi_phep_ibfk_1')->references('id')->on('nhan_vien')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nghi_phep', function(Blueprint $table)
		{
			$table->dropForeign('nghi_phep_ibfk_1');
		});
	}

}
