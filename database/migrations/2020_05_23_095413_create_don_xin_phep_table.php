<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonXinPhepTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('don_xin_phep', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('MaNV')->unsigned()->index();
			$table->string('TieuDe');
			$table->text('NoiDung', 65535);
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