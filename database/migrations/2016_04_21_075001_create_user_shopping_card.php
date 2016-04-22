<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserShoppingCard extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('user_shopping_card', function (Blueprint $table) {
            $table->increments('id');
            $table->date('datetime');
            $table->string('type_product');
            $table->string('size');
            $table->string('name_product');
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_shopping_card');
    }

}
