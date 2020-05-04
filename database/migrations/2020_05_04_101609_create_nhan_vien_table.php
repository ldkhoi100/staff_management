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
			$table->integer('MaLV')->index('MaCV');
			$table->integer('Ma_Luong')->index('Ma_Luong');
			$table->string('Ho_Ten');
			$table->string('Gioi_Tinh', 20);
			$table->integer('So_Dien_Thoai');
			$table->integer('Dia_Chi');
			$table->integer('Cham_Cong')->default(0);
			$table->string('So_Phep_Con_Lai')->default('12');
			$table->integer('Lich_Su_Nghi_Phep')->default(0);
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
		Schema::drop('nhan_vien');
	}

}
