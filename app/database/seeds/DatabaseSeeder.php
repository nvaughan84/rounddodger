<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('CalendarGroupsTableSeeder');
	}

}

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


/*class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create(array('email' => 'foo@bar.com', 'username'=>'nick', 'password'=>'password'));
		$this->call('BlogsTableSeeder');
	}

}*/