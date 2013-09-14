@extends('admin.master')
@section('content')
<h2>Find user</h2>
<?php echo Form::open(array('url'=>'admin/user/search', 'method'=>'post')); ?>
<?php echo Form::Input('text','search'); ?>
<?php echo Form::submit('find', array('class'=>'btn'));?>
<?php echo Form::close(); ?>

@stop