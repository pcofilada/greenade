<div class="col-sm-offset-3 col-md-6 "><input id="pac-input" class="controls" type="text" placeholder="Search Box"></div>
<div class="col-md-1"><button class="controls btn btn-success">GO!</button></div>
<textarea id="map_data" class="hidden"><?php echo str_replace('\/','/',json_encode($reports)); ?></textarea>
<div id="map" style="width: 100%; height: 100%;"></div>