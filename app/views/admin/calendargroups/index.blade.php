@extends('admin.master')
@section('content')
 <h1>Calendar Groups</h1>

@foreach($calendargroups as $group)
	<div class='row-fluid'>
		<div class='span4'>{{$group->name}}</div>
		<div class='span2'>{{link_to('admin/calendar/group/'.$group->id.'/edit', 'edit', array('class'=>'label'))}}</div>
	</div>
@endforeach

@stop