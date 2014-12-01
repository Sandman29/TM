<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('items_users', function($table) {
			$table->integer('item_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('item_id')->references('id')->on('items'); 
			$table->foreign('user_id')->references('id')->on('users');
		}); 
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('items_users');
	}

}
