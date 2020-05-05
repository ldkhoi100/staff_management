<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNghiPhepTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nghi_phep', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('MaNV')->index('MaNV');
			$table->dateTime('Tu_Ngay')->nullable();
			$table->dateTime('Den_Ngay')->nullable();
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
		Schema::drop('nghi_phep');
	}

}
