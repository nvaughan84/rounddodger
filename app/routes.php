<?php

use Illuminate\Support\Facades\Redirect;

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

//FILTERS
Route::filter('auth', function()
{
	if (!Sentry::check())
		return Redirect::to('/login');
});

Route::get('logout', function()
{
	Sentry::logout();
	return Redirect::to('login');
});

/*-----GENERAL ADMIN ROUTES
 * 
 */

Route::group(['before' => 'auth'], function() {
	Route::get('/', function()
	{
		return Redirect::to('/admin');
	});
	
	Route::get('admin', function()
	{
		return View::make('admin.index');
	});
});




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

Route::group(['before' => 'auth'], function() { // group filter to check user is logged in
	Route::resource('admin/user', 'UserController',  array('before'=>'auth')); //all the user actions	
	//routes to search for and find a user within the admin

});


/*-----USERS GRUOPS ROUTES ------
* Contains all routes for user functions (e.g login, signup)
* Also contains the routes for admin user functions (e.g admin/user/create)
*/

Route::resource('admin/usergroup', 'UserGroupController');

/*-----COMPOSERS ------*/

View::composer('admin.partials.users.widget',function($view)
{
	$users = User::where('activated', '=', '1')->get();
	$data = array('active'=>$users);
	$view->with($data);
});



