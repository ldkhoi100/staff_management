<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChamCongThangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cham_cong_thang', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('Thang_Hien_Tai');
			$table->integer('So_Cong');
			$table->integer('Nghi_Le');
			$table->integer('Nghi_Phep');
			$table->integer('Nghi_Khong_Luong');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cham_cong_thang');
	}

}
