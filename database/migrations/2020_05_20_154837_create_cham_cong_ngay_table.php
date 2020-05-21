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
			$table->increments('id');
			$table->integer('MaNV')->unsigned()->index('MaNV');
			$table->integer('LuongCB')->unsigned()->index('LuongCB');
			$table->date('Ngay_Hien_Tai')->nullable();
			$table->boolean('Ngay_Le')->default(0);
<<<<<<< HEAD:database/migrations/2020_05_20_154837_create_cham_cong_ngay_table.php
			$table->integer('Luong')->default(100);
=======
			$table->boolean('Luong')->default(0);
>>>>>>> 94fee29561e4bcdebd2199b811696f59009bd171:database/migrations/2020_05_19_163040_create_cham_cong_ngay_table.php
			$table->text('Ghi_Chu', 65535)->nullable();
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
