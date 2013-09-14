<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use Cartalyst\Sentry\Facades\Laravel\Sentry;

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return View::make('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		try {
			$username = Input::get('username');
			$password = Input::get('password');
			$first_name = Input::get('first_name');
			$last_name = Input::get('last_name');
			
			$rules = array(
					'username'=>'required|email',
					'first_name'=>'required',
					'last_name'=>'required',
					'password'=>'required'
					);
		 	$validator = Validator::make(Input::all(), $rules);
			Input::flash();
		    if ($validator->fails())
		    {
		        return Redirect::to('admin/user/create')->withErrors($validator);
		    }
			
			$user = Sentry::getUserProvider()->create(array(
					'email'    => $username,
					'password' => $password,
					'first_name' => $first_name,
					'last_name' => $last_name
			));
			return Redirect::to('admin/user');
			$message = 'User added';
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			$message = 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			$message = 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			$message = 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			$message = 'Group was not found.';
		}
			
		$data = array('message'=>$message);
		return View::make('admin.users.save', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = Sentry::getUserProvider()->findById($id);
		return View::make('admin.users.show',compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try
		{
		    $user = Sentry::getUserProvider()->findById($id);
		    //print_r($user);
		    return View::make('admin.users.edit', compact('user'));
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $message = 'User was not found.';
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$username = Input::get('username');
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		
		try
		{
			// Find the user using the user id
			$user = Sentry::getUserProvider()->findById($id);
		
			// Update the user details
			$user->email = Input::get('email');
    		$user->first_name = Input::get('first_name');
    		$user->last_name = Input::get('last_name');
			// Update the user
			if ($user->save())
			{
				return Redirect::to('admin/user');
			}
			else
			{
				// User information was not updated
			}
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			echo 'User was not found.';
		}
	}
	
	public function finduser()
	{	
		return View::make('admin.users.find');
	}
	
	public function search()
	{
		$term = Input::get('search');
		
		$users = DB::table('users')
		->where('first_name','LIKE',$term.'%')
		->orWhere('last_name','LIKE',$term.'%')
		->orWhere('email','LIKE','%'.$term.'%')
		->get();
		
				
		$data = array('term'=>$term, 'users'=>$users);
		return View::make('admin.users.search', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
			// Find the user using the user id
			$user = Sentry::getUserProvider()->findById($id);
		
			// Delete the user
			$user->delete();
			return Redirect::to('admin/user');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			echo 'User was not found.';
		}
	}
	
	public function checkLogin()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		
		$rules = array(
				'username'=>'required|email',
				'first_name'=>'required',
				'last_name'=>'required',
				'password'=>'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		Input::flash();
		/*if ($validator->fails())
		{
			return Redirect::to('/login')->withErrors($validator);
		}*/
		
		try
		{
			// Set login credentials
			$credentials = array(
					'email'    => $username,
					'password' => $password,
			);
		
			// Try to authenticate the user
			$user = Sentry::authenticate($credentials, false);
			return Redirect::to('admin/user');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			echo 'User is not activated.';
		}
		
		// The following is only required if throttle is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			echo 'User is banned.';
		}
	}

}