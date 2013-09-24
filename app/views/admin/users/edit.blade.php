@extends('admin.master')
@section('content')

<?php //create array for the groups ?>
<?php $groups; $groups[]='Please select a group'; ?>
@foreach($usergroups as $group)
	<?php $groups[$group->id] = $group->name; ?>
@endforeach
	
<?php echo Form::open(array('url'=>'admin/user/'.$user->id, 'method'=>'put')); ?>
 <!-- username field -->
 <?php echo Form::label('email', 'Email'); ?>
 <?php echo Form::text('email', $user->email); ?><br>
 <!-- password field -->
 <?php echo Form::label('password', 'Password'); ?>
 <?php echo Form::password('password'); ?><br>
 
  <!-- first name field -->
 <?php echo Form::label('first_name', 'First Name'); ?>
 <?php echo Form::text('first_name', $user->first_name); ?><br>
 
  <!-- last name field -->
 <?php echo Form::label('last_name', 'Last Name'); ?>
 <?php echo Form::text('last_name', $user->last_name); ?><br>
 
   <!-- last name field -->
 <?php echo Form::label('group', 'User Group'); ?>
<?php echo Form::select('group', $groups);?><br>
 
 
 <!-- login button -->
 <?php echo Form::submit('update', array('class'=>'btn'));?>
<?php echo Form::close(); ?>
{{link_to('/admin/user/'.$user->id,'delete')}}


@stop