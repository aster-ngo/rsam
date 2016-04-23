<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNppIVCDB extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('npp.ivcdb', function(Blueprint $table)
		{
			$table->increments('id');
	        $table->string('filename',100);
	        $table->string('path',100);
	        $table->string('conner');
	        $table->integer('collection');
	        $table->string('size',50);
	        $table->date('aqstime');
	        $table->date('updatetime');
	        $table->double('east');
	        $table->double('west');
	        $table->double('south');
	        $table->double('north');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('npp.ivcdb');
	}

}
