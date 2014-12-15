<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('category_item', function($table) {
			# AI, PK
			# none needed
			# General data...
			$table->integer('category_id')->unsigned();
			$table->integer('item_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('category_id')->references('id')->on('categories');
			$table->foreign('item_id')->references('id')->on('items');
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
		Schema::drop('category_item');
	}

}
