<div class="tabbable"> <!-- Only required for left/right tabs -->
		  <!-- TABS -->
		  <ul class="nav nav-tabs">
		    <li class="active"><a href="#tab1" data-toggle="tab">Newly Activated Users</a></li>
		    <li><a href="#tab2" data-toggle="tab">Banned users</a></li>
		  </ul>
		  
		  <!-- TAB CONTENT -->
		  <div class="tab-content">
		    <div class="tab-pane active" id="tab1">
		      <p><?php 
				foreach($active as $user)
				{
					echo $user->first_name;
				}
		      ?></p>
		    </div>
		    <div class="tab-pane" id="tab2">
		      <p>All banned users</p>
		    </div>
		  </div>
		  <!-- END TAB CONTENT -->
		</div>