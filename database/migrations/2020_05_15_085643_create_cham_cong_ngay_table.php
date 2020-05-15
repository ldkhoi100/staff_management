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
			$table->integer('Ca_Lam')->unsigned()->index('Ca_Lam');
			$table->date('Ngay_Hien_Tai');
			$table->boolean('Ngay_Le')->default(0);
			$table->boolean('Tru_Luong')->default(0);
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
