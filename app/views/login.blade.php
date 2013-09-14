@extends('master')
@section('content')


<?php echo Form::open(array('url'=>'login/check')); ?>
 <!-- username field -->
 <?php echo Form::label('username/email', 'Username'); ?>
 <?php echo Form::text('username', Input::old('username')); ?><br>
 <!-- password field -->
 <?php echo Form::label('password', 'Password'); ?>
 <?php echo Form::password('password'); ?><br>
 
 
 <!-- login button -->
 <?php echo Form::submit('login', array('class'=>'btn'));?>
<?php echo Form::close(); ?>

@stop