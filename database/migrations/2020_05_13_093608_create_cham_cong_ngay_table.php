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
			$table->integer('So_ca_Lam')->default(0);
			$table->integer('Tong_He_So_Ca_Lam')->default(0)->index('Ca_Lam');
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
