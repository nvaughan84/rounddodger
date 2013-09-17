@extends('admin.master')
@section('content')

<?php echo Form::open(array('url'=>'admin/usergroup/'.$usergroup->id, 'method'=>'delete')); ?>

Delete User Group '{{$usergroup->name}}'<br>
 
 
<?php echo Form::submit('yes', array('class'=>'btn'));?>
<?php echo Form::close(); ?>


@stop