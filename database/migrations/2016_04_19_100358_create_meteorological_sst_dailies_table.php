<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeteorologicalSstDailiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meteorological.sst_daily', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('time');
			$table->string('filename');
			$table->string('size');
			$table->string('pathfile'); // Đường dẫn của file netCDF
			$table->date('update_time');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meteorological.sst_daily');
	}

}
