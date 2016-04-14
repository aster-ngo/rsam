<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeteorologicalVariableInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meteorological_variable_infos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('variable_name',100);
            $table->string('units',100);
            $table->string('standard_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meteorological_variable_infos');
	}

}
