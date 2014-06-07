<form method="post" id="geocoding_form">
	<div class="col-sm-offset-3 col-md-6 input"><input id="pac-input address" class="controls" type="text" placeholder="Search Box" name="address"></div>
	<div class="col-md-1"><input type="submit" class="controls btn btn-success" value="Search" ></div>
</form>
	<textarea id="map_data" class="hidden"><?php echo str_replace('\/','/',json_encode($reports)); ?></textarea>
	<div id="map" style="width: 100%; height: 100%;"></div>
