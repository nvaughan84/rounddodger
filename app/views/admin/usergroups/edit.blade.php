@extends('admin.master')
@section('content')

<?php echo Form::open(array('url'=>'admin/usergroup/'.$usergroup->id, 'method'=>'put')); ?>
 <!-- username field -->
 <?php echo Form::label('name', 'Name'); ?>
 <?php echo Form::text('name', $usergroup->name); ?><br>
 <!-- password field -->
 <?php echo Form::label('permissions', 'Permissions'); ?>
 <?php echo Form::password('permissions', $usergroup->permissions); ?><br>
 
 
 <?php echo Form::submit('update', array('class'=>'btn'));?>
<?php echo Form::close(); ?>
{{link_to('/admin/usergroup/'.$usergroup->id,'delete')}}


@stop