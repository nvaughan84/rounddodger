@extends('admin.master')
@section('content')
<h2>All Groups</h2>

@foreach($groups as $group)
	<div class='row-fluid'>
		<div class='span4'>{{$group->name}}</div>
		<div class='span2'>{{link_to('admin/usergroup/'.$group->id.'/edit', 'edit', array('class'=>'label'))}}</div>
	</div>
@endforeach

@stop