@extends('admin.master')


@section('content')
	<div id='calendar'></div>

	<div class='filter'>
	@foreach($calendargroups as $group)
		
		{{Form::checkbox($group->name, $group->id, true, array('class'=>'group'))}} {{$group->name}}<br>
	@endforeach
</div>

	<div style='display:none'>
<!-- POPUP EVENT EDITOR  -->
	<div id="dialog" title="Basic dialog">
	  <form method="POST" action="publish.php">
	 <div id="dialog">
	  <label>Title:</label>  <input type="text" name="title"><br>
	  <label>Date:</label>  <input type="text" name="date" class='date'><br>
	  <label>Calendar:</label>
	  <select>
	  <option>Year 7</option>
	  <option>Year 8</option>
	  <option>Year 9</option>
	  <option>Year 10</option>
	  <option>Year 11</option>
	  </select><br>
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
	  <label>Title:</label>  <input type="text" name="title"><br>
	  <label>Date:</label>  <input type="text" name="date" class='date'><br>
	  <label>Calendar:</label>
	  <select>
	  <option>Year 7</option>
	  <option>Year 8</option>
	  <option>Year 9</option>
	  <option>Year 10</option>
	  <option>Year 11</option>
	  </select><br>
	  	  <label>Repeat:</label>
	  <select>
	  <option>No repeat</option>
	  <option>Every Day</option>
	  <option>Every Week</option>
	  <option>Every Month</option>
	  <option>Every Year</option>
	  </select><br
	 </div>
	</form>
	</div>
</div>
@stop

@section('scripts')
{{ HTML::script('js/fullcalendar/fullcalendar.min.js'); }}
 <script>

	$(document).ready(function() {
		
		$('.date').datepicker();

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
				$("#create").find('input[name="date"]').val(date);
				$("#create").dialog({
						modal: true,
	                   	title: 'New Event',
	                  	buttons: {
	                	   'Create': function(){},
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
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1),
					group: '5'
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2),
					group: '1'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false,
					group: '1'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false,
					group: '2'
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					group: '2'
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					group: '3'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false,
					group: '4'
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/',
					group: '5'
				}
			]
		});
		
	});

</script>
@stop


