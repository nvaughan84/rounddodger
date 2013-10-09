@extends('admin.master')

@section('content')
	<div id='calendar'></div>

	<div class='filter'>
	
	
	@foreach($calendargroups as $group)		
		{{Form::checkbox($group->name, $group->id, true, array('class'=>'group'))}} {{$group->name}}<br>
		<?php $groupArray[$group->id]=$group->name; ?>
	@endforeach
</div>

	<div style='display:none'>
<!-- POPUP EVENT EDITOR  -->
	<div id="dialog" title="Basic dialog">
	  <form method="POST" action="publish.php">
	 <div id="dialog">
	  <label>Title:</label>  <input type="text" name="title"><br>
	  <label>From:</label>  <input type="text" name="from" class='from'><br>
	  <label>To:</label>	<input type="text" name="to" class='to'><br>
	  <label>Group:</label>
	  <?php echo Form::select('calendar_group', $groupArray); ?>
	 <br>
	  <label>Repeat:</label>
	 <select>
	  <option>No repeat</option>
	  <option>Every Day</option>
	  <option>Every Week</option>
	  <option>Every Month</option>
	  <option>Every Year</option>
	  </select><br>
	 </div>
	</form>
	</div>
	
<!-- CREATE EVENT  -->
	<div id="create" title="Basic dialog">
	  <form method="POST" action="publish.php">
	 <div id="dialog">
	  <label>Title:</label>  <input class='title' type="text" name="title"><br>
	  <label>From:</label>  <input type="text" name="from" class='from'><br>
	  <label>To:</label>	<input type="text" name="to" class='to'><br>
	   <label>Group:</label>
	  <?php echo Form::select('calendar_group', $groupArray, null, array('class'=>'calendar_group')); ?>
	 <br>
	  <label>Repeat:</label>
	  <select>
	  <option>No repeat</option>
	  <option>Every Day</option>
	  <option>Every Week</option>
	  <option>Every Month</option>
	  <option>Every Year</option>
	  </select><br>
	 </div>
	</form>
	</div>
</div>
@stop



@section('scripts')
{{ HTML::script('js/fullcalendar/fullcalendar.min.js'); }}
 <script>

	$(document).ready(function() {
		
		$('.from, .to').datepicker({dateFormat:'yy-mm-dd'});

		$(".group").change(function () {
		    $("#calendar").fullCalendar("renderEvents");
		    $("#calendar").fullCalendar("refetchEvents");
		});
		
	

		function filter(event) {
		    return $("#filter > option:selected").attr("id") === event.group;
		}		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek'
			},
			editable: true,
			eventClick: function(calEvent, jsEvent, view)
			{
							
				$("#dialog").find('input[name="title"]').val(calEvent.title);
				$("#dialog").dialog({
						modal: true,
	                   	title: calEvent.title,
	                   	buttons: {
	                	   'Update': function(){},
	                	   'Delete': function(){
	                		   $('#calendar').fullCalendar( 'removeEvents', calEvent._id);
	                		   $(this).dialog('close')
	                	   }
	                   }
	             });
			},
			eventMouseover: function(event, jsEvent, view)
			{				
				$(this).addClass('hover');
				console.log(event);
			},
			eventMouseout: function()
			{
				$(this).removeClass('hover');
			},
			eventDrop: function()
			{
				alert('event moved');
			},
			eventResizeStop: function(event, jsEvent, ui, view)
			{
				alert('event updated');
			},
			dayClick: function(date, allDay, jsEvent, view )
			{		
				
				newDate = $.fullCalendar.formatDate(date, 'dd/MM/yyyy');
				$("#create").find('input[name="date"]').val(newDate);
				$("#create").dialog({
					
						modal: true,
	                   	title: 'New Event',
	                  	buttons: {
	                	   'Create': function()
	                	   {
		                	   from = $('#create').find('.from').val();
		                	   to = $('#create').find('.to').val();
		                	   title = $('#create').find('.title').val();
		                	   group = $('#create').find('.calendar_group').val();

		                	   console.log(title);

		                	   $.post('http://rounddodger.dev/admin/calendar/events/add', {
		                		   to:to,
		                		   from:from,
		                		   title:title,
		                		   group:group
		                		   }, function(data) {
		                			   
		                		   })
		                		   .success(function(data)
				                		   {
		                			   			$('#create').dialog('close');
		                			   			//clear values
		                			   			from = $('#create').find('.from').val('');
		         		                	   	to = $('#create').find('.to').val('');
		         		                	   	title = $('#create').find('.title').val('');
				                		   })
		                		   .fail(function()
				                		   {
												alert('Error! Event not saved. Please try again');
				                		   });
		                		   
		                	},
	                	   'Close': function(){
	                		   $(this).dialog('close')
	                	   }
	                   }
	             });
			},
			eventRender: function(event, element) {
				$(element).hide();
				elements = new Array();
				$('.filter').find('.group:checked').each(function()
						{
						    if (event.group !== $($(this)).val()) {
						        //$(element).hide();
						    } else {
						        // Not sure if you need this
						        //$(element).show();
						        elements.push(element);
						    }
						});
				for(var i=0; i<elements.length; i++)
				{
					$(elements[i]).show();
				}

			},
			events: 'http://rounddodger.dev/admin/calendar/events/json/all'
		});
		
	});

</script>
@stop


