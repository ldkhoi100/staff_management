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
			$table->date('Ngay_Hien_Tai');
			$table->integer('So_ca_Lam')->default(0);
			$table->boolean('Ngay_Le')->default(0);
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
