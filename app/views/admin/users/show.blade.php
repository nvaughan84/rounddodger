@extends('admin.master')
@section('content')

{{$user->email}}

<?php echo Form::open(array('url'=>'admin/user/'.$user->id, 'method'=>'delete')); ?>
 <!-- username field -->
 
 <!-- login button -->
 <?php echo Form::submit('delete');?>
<?php echo Form::close(); ?>

@stop