<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTableEosMod04 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

    public function up()
{
    Schema::create('eos.mod04', function (Blueprint $table) {
        $table->increments('id');
        $table->string('filename',100);
        $table->string('path',100);
        $table->string('conner');
        $table->integer('collection');
        $table->string('size',50);
        $table->date('aqstime');
        $table->date('updatetime');

    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('eos.mod04');
    }

}