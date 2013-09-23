<?php

/*-----COMPOSERS ------*/

View::composer('admin.partials.users.widget',function($view)
{
	$users = User::where('activated', '=', '1')->get();
	$data = array('active'=>$users);
	$view->with($data);
});