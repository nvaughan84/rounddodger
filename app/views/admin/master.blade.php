<!DOCTYPE html>
<html>
  <head>
    <title>Welcome to the Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.min.css'); }}
  </head>
  <body>
  
  <div class="navbar">
  <div class="navbar-inner">
    <span class="brand">Admin</span>
    <ul class="nav">
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
		</ul>
      </div>
      
	  <div class="span6">@yield('content')</div>
	  <div class="span4">
	  	@yield('sideContent')	
	  </div>
	</div>
</div>
        
    <script src="http://code.jquery.com/jquery.js"></script>
    {{ HTML::script('js/bootstrap.min.js'); }}
  </body>
</html>