@extends('admin.master')
@section('content')
 <h1>Calendar Groups</h1>


<?php echo Form::open(array('url'=>'admin/calendar/group/', 'method'=>'post')); ?>

 <?php echo Form::label('name', 'Group name'); ?>
 <?php echo Form::text('name', Input::old('name')); ?><br>

 <?php echo Form::label('description', 'Description'); ?>
 <?php echo Form::textarea('description', Input::old('description')); ?><br>

 
 
 <!-- login button -->
 <?php echo Form::submit('create', array('class'=>'btn'));?>
<?php echo Form::close(); ?>


@stop