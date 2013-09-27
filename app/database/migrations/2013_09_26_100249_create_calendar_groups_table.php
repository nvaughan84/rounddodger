<?php

use Illuminate\Database\Migrations\Migration;

class CreateCalendarGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_groups', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendar_groups');
	}

}