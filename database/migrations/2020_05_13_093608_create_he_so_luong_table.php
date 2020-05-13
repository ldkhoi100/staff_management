<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeSoLuongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('he_so_luong', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->decimal('He_So_Luong', 2, 1)->unique('Bac_Luong');
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
		Schema::drop('he_so_luong');
	}

}
