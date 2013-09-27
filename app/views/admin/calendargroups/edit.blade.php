@extends('admin.master')
@section('content')
 <h1>Calendar Groups</h1>


<?php echo Form::open(array('url'=>'admin/calendar/group/'.$calendargroup->id, 'method'=>'put')); ?>

 <?php echo Form::label('name', 'Group name'); ?>
 <?php echo Form::text('name', $calendargroup->name); ?><br>

 <?php echo Form::label('description', 'Description'); ?>
 <?php echo Form::textarea('description', $calendargroup->description); ?><br>

 
 
 <!-- login button -->
 <?php echo Form::submit('update', array('class'=>'btn'));?>
<?php echo Form::close(); ?>
{{link_to('/admin/calendar/group/'.$calendargroup->id,'delete')}}


@stop