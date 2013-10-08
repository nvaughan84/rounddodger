<h3>Create new event</h3>

@foreach($groups as $group)
	<?php $groupArray[$group->id]=$group->name; ?>
@endforeach

<?php echo Form::open(array('url'=>'admin/calendar/event/', 'method'=>'post')); ?>

 <?php echo Form::label('title', 'Title'); ?>
 <?php echo Form::text('title', Input::old('title')); ?><br>

 <?php echo Form::label('description', 'Description'); ?>
 <?php echo Form::textarea('description', Input::old('description')); ?><br>
 
 <?php echo Form::label('start', 'Start date'); ?>
 <?php echo Form::text('start', Input::old('start'), array('class'=>'start')); ?><br>

 <?php echo Form::label('end', 'End date'); ?>
 <?php echo Form::text('end', Input::old('end'), array('class'=>'end')); ?><br> 
 
 <?php echo Form::label('group', 'Calendar group'); ?>
   <?php echo Form::select('calendar_group', $groupArray); ?>
 <br>
 <!-- login button -->
 <?php echo Form::submit('create', array('class'=>'btn'));?>
<?php echo Form::close(); ?>

@section('scripts')
<script type="text/javascript">
$(document).ready(function()
{
	$('.start').datepicker({dateFormat:'yy-mm-dd'});
	$('.end').datepicker({dateFormat:'yy-mm-dd'});
});
</script>
@stop