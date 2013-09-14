<?php

class BlogsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('blogs')->truncate();

		$blogs = array('user'=>1, 'title'=>'My first blog','body'=>'this is my first blog'

		);

		// Uncomment the below to run the seeder
		DB::table('blogs')->insert($blogs);
	}

}
