<?php

/*-----COMPOSERS ------*/

View::composer('admin.partials.users.widget',function($view)
{
	$users = User::where('activated', '=', '1')->get();
	$data = array('active'=>$users);
	$view->with($data);
});

View::composer('admin.partials.calendar.addevent',function($view)
{
	$groups = CalendarGroup::all();
	$data = array('groups'=>$groups);
	$view->with($data);
});