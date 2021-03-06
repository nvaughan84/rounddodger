<?php

class CalendarEventsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.calendarevents.index');
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
		$title = Input::get('title');
		$description = Input::get('description');
		$start = Input::get('start');
		$end = Input::get('end');
		$group = Input::get('calendar_group');
		
		//$start = date('Y-m-d', $start);
		
		$calendar_event = new CalendarEvents();
		$calendar_event->title = $title;
		$calendar_event->description = $description;
		$calendar_event->start = $start;
		$calendar_event->end = $end;
		$calendar_event->group = $group;
		
		echo $title;
		echo $description;
		echo $start;
		echo $end;
		echo $group;		
		
		$calendar_event->save();
		
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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