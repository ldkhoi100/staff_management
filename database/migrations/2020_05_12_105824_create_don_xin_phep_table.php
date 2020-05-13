<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonXinPhepTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('don_xin_phep', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('MaNV')->index('MaNV');
			$table->string('TieuDe');
			$table->text('NoiDung', 65535);
			$table->dateTime('Tu_Ngay');
			$table->dateTime('Den_Ngay');
			$table->integer('TinhTrang');
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
		Schema::drop('don_xin_phep');
	}

}
