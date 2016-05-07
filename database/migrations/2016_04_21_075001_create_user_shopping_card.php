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
            $table->integer('userId');
            $table->string('type_product');
            // $table->string('type_data');
            $table->string('name_product');
            $table->string('size');
            $table->date('datetime'); // time add shopping card.
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
