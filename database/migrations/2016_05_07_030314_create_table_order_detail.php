<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('orderDetail', function (Blueprint $table) {
            $table->increments('orderId');
            $table->integer('product_id');
            $table->string('type_product');
            $table->string('size');
            $table->date('time_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orderDetail');
    }


}
