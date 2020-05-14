<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManvCalamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('manv_calam', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('MaNV')->index('MaNV');
			$table->integer('Ca_Lam')->unsigned()->index('Ca_Lam');
			$table->date('Ngay_Tao')->nullable();
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
		Schema::drop('manv_calam');
	}

}
