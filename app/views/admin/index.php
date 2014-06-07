<script src="/assets/js/Chart.js"></script>
	<div class="row">
		<div class="col-md-6">
			<h4>Top Contributors</h4>
			<canvas id="topContributors" height="300" width="400"></canvas>
		</div>
		<div class="col-md-6">
			<h4>Top Disccused</h4>
			<canvas id="mostDiscussed" height="300" width="300"></canvas>
		</div>
	</div>
	<script>
		var barChartData = {
			labels : ["Patrick","Dyesi","Arianne","Janine","May"],
			datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					data : [28,48,40,19,96]
				},
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					data : [65,59,90,81,56]
				}
			]
			
		}
		var doughnutData = [
				{
					value: 30,
					color:"#F7464A"
				},
				{
					value : 50,
					color : "#46BFBD"
				},
				{
					value : 100,
					color : "#FDB45C"
				},
				{
					value : 40,
					color : "#949FB1"
				},
				{
					value : 120,
					color : "#4D5360"
				}
			
			];
		var myLine = new Chart(document.getElementById("topContributors").getContext("2d")).Bar(barChartData);
		var myDoughnut = new Chart(document.getElementById("mostDiscussed").getContext("2d")).Doughnut(doughnutData);
	</script>