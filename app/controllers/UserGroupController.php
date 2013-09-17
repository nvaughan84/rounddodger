<?php

use Illuminate\Support\Facades\Redirect;

class UserGroupController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = UserGroup::all();
		return View::make('admin.usergroups.index', compact('groups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.usergroups.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
		{
			// Create the group
			$group = Sentry::createGroup(array(
					'name'        => Input::get('name'),
					'permissions' => array(
							'admin' => 1
					),
			));
			
			return Redirect::to('admin/usergroup');
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
			echo 'Name field is required';
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			echo 'Group already exists';
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
 		$usergroup = Sentry::findGroupById($id);

 		return View::make('admin.usergroups.show', compact('usergroup'));
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
			$usergroup = Sentry::findGroupById($id);
			return View::make('admin.usergroups.edit', compact('usergroup'));
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			echo 'Group was not found.';
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
		try
		{
			// Find the group using the group id
			$group = Sentry::findGroupById($id);
		
			// Update the group details
			$group->name = Input::get('name');
			$group->permissions = array(
					'admin' => 1,
					'users' => 1,
			);
		
			// Update the group
			if ($group->save())
			{
				return Redirect::to('admin/usergroup');
			}
			else
			{
				// Group information was not updated
			}
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			echo 'Group already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			echo 'Group was not found.';
		}
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
			// Find the group using the group id
			$group = Sentry::findGroupById($id);		
			// Delete the group
			$group->delete();
			return Redirect::to('admin/usergroup');
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			echo 'Group was not found.';
		}
	}

}