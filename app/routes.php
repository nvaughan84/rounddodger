<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//SUBDOMAIN ROUTING
Route::group(array('domain' => '{account}.rounddodger.dev'), function()
{

	Route::get('user/{id}', function($account, $id)
	{
		echo $account;
	});

});

//FILTERS
Route::filter('auth', function()
{
	if (!Sentry::check())
		return Redirect::to('/login');
});

Route::filter('admin_auth', function()
{
	if (!Sentry::check())
	{
		return Redirect::to('/login');
	}
	$user = Sentry::getUser();
	if (!$user->hasAccess('admin'))
	{
		return Redirect::to('/login');
	}
});

Route::get('logout', function()
{
	Sentry::logout();
	return Redirect::to('login');
});

/*-----GENERAL ADMIN ROUTES
 * 
 */

/*Route::group(['before' => 'auth'], function() {
	Route::get('/', function()
	{
		return Redirect::to('/admin');
	});
	
	Route::get('admin', function()
	{
		return View::make('admin.index');
	});
});*/




/*-----USERS ROUTES ------
 * Contains all routes for user functions (e.g login, signup)
 * Also contains the routes for admin user functions (e.g admin/user/create)
 */
Route::post('login/check', 'UserController@checkLogin'); //route to check a user is logged in
Route::get('/login', function() //login form
{
	return View::make('login');
});

Route::get('admin/user/finduser','UserController@finduser'); //form to find a user
Route::post('admin/user/search','UserController@search');

//Route::group(['before' => 'admin_auth'], function() { // group filter to check user is logged in
	Route::resource('admin/user', 'UserController',  array('before'=>'auth')); //all the user actions	
	//routes to search for and find a user within the admin

//});


/*-----USERS GROUPS ROUTES ------
*/
Route::resource('admin/usergroup', 'UserGroupController');

/*-----CALENDAR GROUPS ROUTES ------
*/
Route::resource('admin/calendar/group', 'CalendarGroupController');

/*-----CALENDAR EVENTS ROUTES ------
 */
Route::resource('admin/calendar/event', 'CalendarEventsController');
Route::post('admin/calendar/events/add', function()
{
	$events = new CalendarEvents();
	$events->description = '';
	$events->end = Input::get('to');
	$events->start = Input::get('from');
	$events->title = Input::get('title');
	$events->group = Input::get('group');
	
	$events->save();
});

Route::get('admin/calendar/event/json/{group_id}', function($group_id)
{
	$events = CalendarEvents::select('title','start','group')->where('group','=',$group_id)->get();
	return $events;
});
Route::get('admin/calendar/events/json/all', array('as'=>'json-events', function()
{
	/*$events = CalendarEvents::select('title','start','group')->get();
	return $events;*/
	return  '[{"title":"Music Club","start":"2013-10-08 00:00:00","group":"1"}, {"title":"Cricket","start":"2013-10-12 00:00:00","group":"2"}]';
}));

/*----- FULL CALENDAR  ROUTES ------
*/

Route::get('admin/calendar', function()
	{
		$calendargroups = CalendarGroup::all();
		return View::make('admin.calendar.calendar', compact('calendargroups'));
	});




