<?php

use Illuminate\Database\Migrations\Migration;

class CreateCalendarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_events', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->dateTime('start');
			$table->dateTime('end');
			$table->smallInteger('allDay')->default(0);
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
		Schema::drop('calendar_events');
	}

}