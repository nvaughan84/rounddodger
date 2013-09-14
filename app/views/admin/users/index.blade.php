@extends('admin.master')
@section('content')
	<h2>All users</h2>
@foreach($users as $user)
	<div class='row-fluid'>
		<div class='span4'>{{$user->first_name}} {{$user->last_name}}</div>
		<div class='span2'>{{link_to('admin/user/'.$user->id.'/edit', 'edit', array('class'=>'label'))}}</div>
	</div>
@endforeach
<!-- <div class='span2 offset4'>{{link_to('/admin/user/create','Create', array('class'=>'btn'))}}</div> -->
@stop

@section('sideContent')
@include('admin.partials.users.widget')
@stop