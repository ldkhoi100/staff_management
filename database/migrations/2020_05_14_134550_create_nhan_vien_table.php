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
			$table->integer('id', true);
			$table->integer('MaCV')->index('MaCV');
			$table->integer('He_So_Luong')->index('Ma_Luong');
			$table->integer('Cham_Cong')->nullable()->index('Cham_Cong');
			$table->string('Anh_Dai_Dien')->nullable();
			$table->string('Ho_Ten');
			$table->date('Ngay_Sinh');
			$table->string('Gioi_Tinh', 20);
			$table->integer('So_Dien_Thoai');
			$table->string('Dia_Chi');
			$table->date('Ngay_Bat_Dau_Lam')->nullable();
			$table->date('Ngay_Nghi_Viec')->nullable();
			$table->integer('Phu_Cap')->default(0);
			$table->integer('Tam_Ung')->default(0);
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
