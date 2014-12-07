<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('categorie_item', function($table) {
			# AI, PK
			# none needed
			# General data...
			$table->integer('categorie_id')->unsigned();
			$table->integer('item_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('categorie_id')->references('id')->on('categories');
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
		Schema::drop('categorie_item');
	}

}
