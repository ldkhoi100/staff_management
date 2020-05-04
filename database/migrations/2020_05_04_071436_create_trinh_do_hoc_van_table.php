<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrinhDoHocVanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trinh_do_hoc_van', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('Ten_TDHV');
			$table->string('Chuyen_Nghanh');
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
		Schema::drop('trinh_do_hoc_van');
	}

}
