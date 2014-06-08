<div class="users">
	<h1>Reports</h1>
	<table class="table table-striped">
		<thead>
			<th></th>
			<th>Title</th>
			<th>Description</th>
			<th>Date Posted</th>
			<th>Location</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach ($report as $report) { ?>
				<tr>
					<td><img src="<?php echo $report['image'][0]; ?>" alt="" style="width: 50px; height: 50px; "></td>
					<td><?php echo $report->title; ?></td>
					<td><?php echo $report->description; ?></td>
					<td><?php echo $report->created_at; ?></td>
					<th>
						<?php 
							$url 		= "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$report->lat.",".$report->long."&sensor=false"; 
							$json 		= @file_get_contents($url);
							$data 		= json_decode($json);
							$status 	= $data->status;			
							$address 	= $data->results[0]->formatted_address;

							echo $address;
			 			?>
					 </th>
					<td>
						<div class="icons">
				                       <form class="delete" action="" method="POST"><input type="submit" value="Solve" />
				                       </form>
						</div>
					</td>
				</tr>

			<?php } ?>
		</tbody>
	</table>
</div>