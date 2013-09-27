<?php

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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		//
	}

}