<?php

class CalendarGroupsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('blogs')->truncate();

		$calendarGroups = array('name'=>'Year 7', 'description'=>'Year 7 events and activities');

		// Uncomment the below to run the seeder
		DB::table('calendar_groups')->insert($calendarGroups);
	}

}
