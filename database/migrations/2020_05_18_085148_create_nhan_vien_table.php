<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNhanVienTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nhan_vien', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hash')->nullable();
			$table->integer('MaCV')->unsigned()->index('MaCV');
			$table->integer('He_So_Luong')->unsigned()->index('Ma_Luong');
			$table->string('Anh_Dai_Dien')->nullable();
			$table->string('Ho_Ten');
			$table->date('Ngay_Sinh');
			$table->string('Gioi_Tinh', 20);
			$table->integer('So_Dien_Thoai');
			$table->string('Dia_Chi');
			$table->date('Ngay_Bat_Dau_Lam')->nullable();
			$table->date('Ngay_Nghi_Viec')->nullable();
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
		Schema::drop('nhan_vien');
	}

}
