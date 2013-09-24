@extends('admin.master')
@section('content')
<h2>Create group</h2>

@foreach($errors->all() as $message)
<div class='alert alert-error'>{{$message}}</div>	
@endforeach

<?php echo Form::open(array('url'=>'admin/usergroup')); ?>
 <!-- username field -->
 <?php echo Form::label('name', 'Name'); ?>
 <?php echo Form::text('name', Input::old('name')); ?><br>
 <!-- password field -->
 <?php echo Form::label('permissions', 'Permissions'); ?>
 <?php echo Form::text('permissions'); ?><br> 
 
 <!-- login button -->
 <?php echo Form::submit('create', array('class'=>'btn'));?>
<?php echo Form::close(); ?>

@stop