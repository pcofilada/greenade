<ul class="nav nav-pills nav-stacked">
	<li><a href="/user/<?php echo $user->name; ?>" class="active"><i class="fa fa-map-marker"></i> Map</a></li>
	<li><a href="/user/<?php echo $user->name; ?>/reports"><i class="fa fa-file-text-o"></i> Reports</a></li>
	<li><a href=""><i class="fa fa-comment-o"></i> Notification</a></li>
	<li><a href=""><i class="fa fa-envelope-o"></i>  Messages</a></li>
	<li><a href=""><i class="fa fa-bolt"></i> Quest</a></li>
</ul>
<?php if (isset($reports)) { ?>
	<div class="reports">
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#myreport" data-toggle="tab">My Reports</a></li>
		  <li><a href="#newest" data-toggle="tab">Newest Reports</a></li>
		  <li><a href="#trending" data-toggle="tab">Trending Reports</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active" id="myreport">.a..</div>
		  <div class="tab-pane" id="newest">..s.</div>
		  <div class="tab-pane" id="trending">...d</div>
		</div>
	</div>	
<?php } ?>
