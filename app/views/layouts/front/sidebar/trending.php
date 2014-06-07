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
				<span><i class="fa fa-smile-o"></i> 30</span>
				<span><i class="fa fa-frown-o"></i> 5</span>
				<span><i class="fa fa-comments-o"></i> 92</span>
			</div>
		</div>
	</div>
<?php } ?>