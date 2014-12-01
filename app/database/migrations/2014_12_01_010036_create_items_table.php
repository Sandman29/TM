<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('items', function($table) {
			$table->increments('id');
			$table->string('task',255);
			$table->timestamps();
			$table->date('due_date');
			$table->date('completion_date');
			$table->boolean('is_completed');

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
		Schema::drop('items');
	}

}
