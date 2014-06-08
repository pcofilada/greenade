<form method="post" id="geocoding_form" class="col-md-10">

<div class="col-sm-offset-2 col-md-6 input"><input id="address" class="controls" type="text" placeholder="Search" name="address"></div>
<div class="col-md-1"><input id="search_btn" type="submit" class="controls-button btn btn-success" value="GO!" ></div>
</form> 

<div class="col-sm-offset-2 col-md-6">
	<div class="col-md-3">
	  <select id="date-filter" class="selectpicker form-control controls-select">
		<option value="0"> -- ALL -- </option>
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
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-3">
	  <select id="year-filter" class="selectpicker form-control controls-select">
	  </select>
	</div>
</div>
<textarea id="map_data" class="hidden"><?php echo str_replace('\/','/',json_encode($reports)); ?></textarea>
<div id="map" style="width: 100%; height: 100%;"></div>