$(document).ready(function(){

	var map = new GMaps({
	  div: '#map',
	  lat: -12.043333,
	  lng: -77.028333,
	  draggable: true
	  /*,
	  click: function(e){
	  	var latLng = e.latLng;
		var fLat = latLng.k;
		var fLng = latLng.A;
	  	initialize(latLng);
	  },
	  infoWindow: {
		  content: '<p>form</p>'
		}
		*/
	});

//gmap events

	var location;
	

	$('a.btn[data-target="#map_report"]').click(function(){
		modal_map_int();
	});

	function modal_map_int(){
		var map_modal = new GMaps({
		  div: '#map_modal',
		  lat: -12.043333,
		  lng: -77.028333,
		  draggable: true,
		  height: 100,
		  width: 500

		  /*,
		  click: function(e){
		  	var latLng = e.latLng;
			var fLat = latLng.k;
			var fLng = latLng.A;
		  	initialize(latLng);
		  },
		  infoWindow: {
			  content: '<p>form</p>'
			}
			*/
		});

	}
	
	function initialize(oData) {
		if(typeof(oData) !='undefined'){
			map.addMarker({
				lat: oData.k,
				lng: oData.A,
				draggable: true,
				click:function(){
					//$('#map_report').modal('show');
					//$('#map_report').find('input[type="text"]#lat').val(oData.k);
					//$('#map_report').find('input[type="text"]#long').val(oData.A);

				},
				infoWindow: {
					content: "<p>TAPOS NA!</p>"
				}
			});
		}
    }



	initialize();

});