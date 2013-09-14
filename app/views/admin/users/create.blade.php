@extends('admin.master')
@section('content')
<h2>Create user</h2>

@foreach($errors->all() as $message)
<div class='alert alert-error'>{{$message}}</div>	
@endforeach

<?php echo Form::open(array('url'=>'admin/user')); ?>
 <!-- username field -->
 <?php echo Form::label('username', 'Username'); ?>
 <?php echo Form::text('username', Input::old('username')); ?><br>
 <!-- password field -->
 <?php echo Form::label('password', 'Password'); ?>
 <?php echo Form::password('password'); ?><br>
 
  <!-- first name field -->
 <?php echo Form::label('first_name', 'First Name'); ?>
 <?php echo Form::text('first_name', Input::old('first_name')); ?><br>
 
  <!-- last name field -->
 <?php echo Form::label('last_name', 'Last Name'); ?>
 <?php echo Form::text('last_name', Input::old('last_name')); ?><br>
 
 
 <!-- login button -->
 <?php echo Form::submit('create', array('class'=>'btn'));?>
<?php echo Form::close(); ?>

@stop