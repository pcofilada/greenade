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
		  <div class="tab-pane active" id="myreport">
		  	<?php foreach ($myreport as $myreport) { ?>
				<div class="myreport clearfix">
					<div class="image col-md-4">
						<img src="<?php echo $myreport['image'][0]; ?>" alt="" style="width: 100%; height: 70px; ">
					</div>
					<div class="info col-md-8">
						<h4 class="title"><?php echo $myreport->title; ?></h4>
						<h5 class="location"><?php 
						$url 		= "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$myreport->lat.",".$myreport->long."&sensor=false"; 

						$json 		= @file_get_contents($url);
						$data 		= json_decode($json);
						$status 	= $data->status;			
						$address 	= $data->results[0]->formatted_address;

						echo $address;
						 ?></h5>
						<div class="status">
							<?php if (Session::has('user')) { ?>
								<a href=""><span><i class="fa fa-smile-o"></i> 30</span></a>
								<a href=""><span><i class="fa fa-frown-o"></i> 5</span></a>
								<a href=""><span><i class="fa fa-comments-o"></i> 92</span></a>
							<?php }else{ ?>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-smile-o"></i> 30</span></a>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-frown-o"></i> 5</span></a>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-comments-o"></i> 92</span></a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		  </div>
		  <div class="tab-pane" id="newest">
		  	<?php foreach ($reports as $newest) { ?>
				<div class="newest clearfix">
					<div class="image col-md-4">
						<img src="<?php echo $newest['image'][0]; ?>" alt="" style="width: 100%; height: 70px; ">
					</div>
					<div class="info col-md-8">
						<h4 class="title"><?php echo $newest->title; ?></h4>
						<h5 class="location"><?php 
						$url 		= "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$newest->lat.",".$newest->long."&sensor=false"; 

						$json 		= @file_get_contents($url);
						$data 		= json_decode($json);
						$status 	= $data->status;			
						$address 	= $data->results[0]->formatted_address;

						echo $address;
						 ?></h5>
						<div class="status">
							<?php if (Session::has('user')) { ?>
								<a href=""><span><i class="fa fa-smile-o"></i> 30</span></a>
								<a href=""><span><i class="fa fa-frown-o"></i> 5</span></a>
								<a href=""><span><i class="fa fa-comments-o"></i> 92</span></a>
							<?php }else{ ?>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-smile-o"></i> 30</span></a>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-frown-o"></i> 5</span></a>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-comments-o"></i> 92</span></a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		  </div>
		  <div class="tab-pane" id="trending">
		  	<?php foreach ($trending as $trending) { ?>
				<div class="trending clearfix">
					<div class="image col-md-4">
						<img src="<?php echo $trending['image'][0]; ?>" alt="" style="width: 100%; height: 70px; ">
					</div>
					<div class="info col-md-8">
						<h4 class="title"><?php echo $trending->title; ?></h4>
						<h5 class="location"><?php 
						$url 		= "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$trending->lat.",".$trending->long."&sensor=false"; 

						$json 		= @file_get_contents($url);
						$data 		= json_decode($json);
						$status 	= $data->status;			
						$address 	= $data->results[0]->formatted_address;

						echo $address;
						 ?></h5>
						<div class="status">
							<?php if (Session::has('user')) { ?>
								<a href=""><span><i class="fa fa-smile-o"></i> 30</span></a>
								<a href=""><span><i class="fa fa-frown-o"></i> 5</span></a>
								<a href=""><span><i class="fa fa-comments-o"></i> 92</span></a>
							<?php }else{ ?>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-smile-o"></i> 30</span></a>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-frown-o"></i> 5</span></a>
								<a href="#" data-toggle="modal" data-target="#login-modal"><span><i class="fa fa-comments-o"></i> 92</span></a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		  </div>
		</div>
	</div>	
<?php } ?>
