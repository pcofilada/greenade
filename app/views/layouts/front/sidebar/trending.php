<?php foreach ($trending as $trending) { ?>
	<div class="trending clearfix">
		<div class="image col-md-4">
			<img src="<?php echo $trending[0]['image']; ?>" alt="" style="width: 100%; height: 70px; ">
		</div>
		<div class="info col-md-8">
			<h4 class="title"><?php echo $trending->title; ?></h4>
			<h5 class="location">Pasig City, Manila</h5>
			<div class="status">
				<span><i class="fa fa-check-circle-o"></i> 30</span>
				<span><i class="fa fa-times-circle-o"></i> 5</span>
				<span><i class="fa fa-comments-o"></i> 92</span>
			</div>
		</div>
	</div>
<?php } ?>