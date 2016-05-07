<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('orderId');
            $table->integer('userId');
            $table->date('timeOrder');
            $table->date('timeExport');
            $table->string('state');
            $table->string('linkDownload');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
    }

}
