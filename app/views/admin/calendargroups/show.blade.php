@extends('admin.master')
@section('content')
 <h1>Calendar Groups</h1>
<?php echo Form::open(array('url'=>'admin/calendar/group/'.$calendargroup->id, 'method'=>'delete')); ?>

Delete Calendar Group '{{$calendargroup->name}}'<br>
 
 
<?php echo Form::submit('yes', array('class'=>'btn'));?>
<?php echo Form::close(); ?>
@stop