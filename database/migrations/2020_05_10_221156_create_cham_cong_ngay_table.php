<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChamCongNgayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cham_cong_ngay', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('Ma_NV')->index('Ma_NV');
			$table->integer('Thang_Hien_Tai')->index('Thang_Hien_Tai');
			$table->dateTime('Ngay_Hien_Tai');
			$table->string('Tinh_Trang')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cham_cong_ngay');
	}

}
