<?php

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

class CalendarGroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$calendargroups = CalendarGroup::all();
		return View::make('admin.calendargroups.index', compact('calendargroups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.calendargroups.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$name = Input::get('name');
		$description = Input::get('description');
		Input::flash();
		
		if($name!='' && $description!='')
		{
			$calendargroup = new CalendarGroup();
			$calendargroup->name = $name;
			$calendargroup->description = $description;
			
			if($calendargroup->save())
			{
				return Redirect::to('admin/calendar/group');
			}
			else
			{
				return Redirect::to('admin/calendar/group/create');
			}
		}
		else
		{
			return Redirect::to('admin/calendar/group/create');
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
		$calendargroup = CalendarGroup::find($id);
		
		return View::make('admin.calendargroups.show', compact('calendargroup'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$calendargroup = CalendarGroup::find($id);
		return View::make('admin.calendargroups.edit', compact('calendargroup'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$calendargroup = CalendarGroup::find($id);

		$name = Input::get('name');
		$description = Input::get('description');

		$calendargroup->name = $name;
		$calendargroup->description = $description;

		$calendargroup->save();

		return Redirect::to('admin/calendar/group');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$calendargroup = CalendarGroup::find($id);

		$calendargroup->delete();
		
		return Redirect::to('admin/calendar/group');
		
	}

}