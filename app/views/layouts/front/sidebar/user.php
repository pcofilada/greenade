<ul class="nav nav-pills nav-stacked">
	<li><a href="/user/<?php echo $user->name; ?>" class="<?php echo ($active == 'map' ? 'active' : null); ?>" ><i class="fa fa-map-marker"></i> Map</a></li>
	<li><a href="/user/<?php echo $user->name; ?>/reports" class="<?php echo ($active == 'reports' ? 'active' : null); ?>" ><i class="fa fa-file-text-o"></i> Reports</a></li>
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
		  	<h3>My Report</h3>
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
							<a href=""><span><i class="fa fa-smile-o"></i> 30</span></a>
							<a href=""><span><i class="fa fa-frown-o"></i> 5</span></a>
							<a href="#" data-toggle="modal" data-target="#myreport-<?php echo $myreport->title ?>"><span><i class="fa fa-comments-o"></i> 92</span></a>
					            	<div class="modal fade" id="myreport-<?php echo $myreport->title ?>" tabindex="-1" role="dialog" aria-labelledby="signup-modalLabel" aria-hidden="true">
						          <div class="modal-dialog">
						            <div class="modal-content">
						              <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                <h2 class="modal-title" id="signup-modalLabel">Add Comment on <?php echo $myreport->title ?></h2>
						              </div>
						              <div class="modal-body">
						                <form class="form-horizontal" role="form" action="/signup" method="POST">
						                   <div class="form-group">
						                     <label for="name" class="col-sm-2 control-label">Comment</label>
						                     <div class="col-sm-10">
						                       <textarea name="" id="" cols="55" rows="5"></textarea>
						                     </div>
						                   </div>
						                  <div class="form-group">
						                    <div class="col-sm-offset-2 col-sm-10">
						                      <input type="submit" class="btn btn-success" value="Comment">
						                      <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
						                    </div>
						                  </div>
						                </form>
						              </div>
						            </div>
						          </div>
						        </div>			
						</div>
					</div>
				</div>
			<?php } ?>
		  </div>
		  <div class="tab-pane" id="newest">
		  	<h3>Newest Report</h3>
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
							<a href=""><span><i class="fa fa-smile-o"></i> 30</span></a>
							<a href=""><span><i class="fa fa-frown-o"></i> 5</span></a>
							<a href="#" data-toggle="modal" data-target="#newest-<?php echo $newest->title ?>"><span><i class="fa fa-comments-o"></i> 92</span></a>
					            	<div class="modal fade" id="newest-<?php echo $newest->title ?>" tabindex="-1" role="dialog" aria-labelledby="signup-modalLabel" aria-hidden="true">
						          <div class="modal-dialog">
						            <div class="modal-content">
						              <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                <h2 class="modal-title" id="signup-modalLabel">Add Comment on <?php echo $newest->title ?></h2>
						              </div>
						              <div class="modal-body">
						                <form class="form-horizontal" role="form" action="/signup" method="POST">
						                   <div class="form-group">
						                     <label for="name" class="col-sm-2 control-label">Comment</label>
						                     <div class="col-sm-10">
						                       <textarea name="" id="" cols="55" rows="5"></textarea>
						                     </div>
						                   </div>
						                  <div class="form-group">
						                    <div class="col-sm-offset-2 col-sm-10">
						                      <input type="submit" class="btn btn-success" value="Comment">
						                      <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
						                    </div>
						                  </div>
						                </form>
						              </div>
						            </div>
						          </div>
						        </div>
						</div>
					</div>
				</div>
			<?php } ?>
		  </div>
		  <div class="tab-pane" id="trending">
		  	<h3>Trending Report</h3>
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
							<a href=""><span><i class="fa fa-smile-o"></i> 30</span></a>
							<a href=""><span><i class="fa fa-frown-o"></i> 5</span></a>
							<a href="#" data-toggle="modal" data-target="#trending-<?php echo $trending->title ?>"><span><i class="fa fa-comments-o"></i> 92</span></a>
					            	<div class="modal fade" id="trending-<?php echo $trending->title ?>" tabindex="-1" role="dialog" aria-labelledby="signup-modalLabel" aria-hidden="true">
						          <div class="modal-dialog">
						            <div class="modal-content">
						              <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                <h2 class="modal-title" id="signup-modalLabel">Add Comment on <?php echo $trending->title ?></h2>
						              </div>
						              <div class="modal-body">
						                <form class="form-horizontal" role="form" action="/signup" method="POST">
						                   <div class="form-group">
						                     <label for="name" class="col-sm-2 control-label">Comment</label>
						                     <div class="col-sm-10">
						                       <textarea name="" id="" cols="55" rows="5"></textarea>
						                     </div>
						                   </div>
						                  <div class="form-group">
						                    <div class="col-sm-offset-2 col-sm-10">
						                      <input type="submit" class="btn btn-success" value="Comment">
						                      <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
						                    </div>
						                  </div>
						                </form>
						              </div>
						            </div>
						          </div>
						        </div>						
					        </div>
					</div>
				</div>
			<?php } ?>
		  </div>
		</div>
	</div>	
<?php } ?>
