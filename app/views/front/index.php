<form method="post" id="geocoding_form">
	<div class="col-sm-offset-3 col-md-6 input"><input id="pac-input address" class="controls" type="text" placeholder="Search Box" name="address"></div>
	<div class="col-md-1"><input type="submit" class="controls btn btn-success" value="Search" ></div>
</form>

	<textarea id="map_data" class="hidden"><?php echo str_replace('\/','/',json_encode($reports)); ?></textarea>
	<div id="map" style="width: 100%; height: 100%;"></div>


  <select id="date-filter" class="selectpicker">
	<option value="0"> ALL </option>
	<option value="1">JAN</option>
	<option value="2">FEB </option>
	<option value="3">MAR</option>
	<option value="4">APR</option>
	<option value="5">MAY</option>
	<option value="6">JUN</option>
	<option value="7">JUL</option>
	<option value="8">AUG</option>
	<option value="9">SEP</option>
	<option value="10">OCT</option>
	<option value="11">NOV</option>
	<option value="12">DEC</option>
  </select>
  <select id="year-filter" class="selectpicker">
  </select>


<script type="text/javascript">
	$(document).ready(function(){

	});
</script>