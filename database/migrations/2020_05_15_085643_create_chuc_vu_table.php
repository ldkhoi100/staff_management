<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChucVuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chuc_vu', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Ten_CV');
			$table->string('Cong_Viec');
			$table->decimal('Bac_Luong', 10);
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
		Schema::drop('chuc_vu');
	}

}
