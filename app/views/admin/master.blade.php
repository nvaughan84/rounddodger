<!DOCTYPE html>
<html>
  <head>
    <title>Welcome to the Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.min.css'); }}
    <!-- Full Calendar and jQuery -->
    {{ HTML::style('css/fullcalendar/fullcalendar.css'); }}
    {{ HTML::style('css/fullcalendar/fullcalendar.print.css'); }}

  </head>
  <body>
  
  <div class="navbar">
  <div class="navbar-inner">
    <span class="brand">Admin</span>
    <ul class="nav">
      <li>{{link_to('admin/calendar','Calendar')}}</li>
      <li>{{link_to('admin/calendar/group','Calendar Groups')}}</li>
      <li>{{link_to('admin/user','Users')}}</li>      
      <li>{{link_to('admin/usergroup','User Groups')}}</li>     
    </ul>
        <ul class="nav pull-right">
      <li>{{link_to('/logout','Logout')}}</li>
    </ul>
  </div>
</div>

<div class='container-fluid'>
	<div class="row-fluid">
	  
	  <div class="span2 bs-docs-sidebar">
        <ul class="nav nav-list">
		  <li class="nav-header">Users</li>
		  <li class="">{{link_to('admin/user','View all users')}}</li>
		  <li>{{link_to('admin/user/create','Create user')}}</li>
		  <li>{{link_to('admin/user/finduser','Find users')}}</li>		  
		  <li class="nav-header">User Groups</li>
		  <li class="">{{link_to('admin/usergroup','View all user groups')}}</li>
		  <li>{{link_to('admin/usergroup/create','Create user groups')}}</li>
		  <li class="nav-header">Calendar Group</li>
		  <li class="">{{link_to('admin/calendar/group','View all calendar groups')}}</li>
		  <li>{{link_to('admin/calendar/group/create','Create calendar group')}}</li>
		</ul>
      </div>
      
	  <div class="span6">@yield('content')</div>
	  <div class="span4">
	  	@yield('sideContent')	
	  </div>
	</div>
</div>
        
    {{ HTML::script('js/jquery.min.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/jquery-ui-1.10.3.custom.min.js'); }}
    

    @yield('scripts')

  </body>
</html>