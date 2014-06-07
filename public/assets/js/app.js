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
	var modal_map_global;

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
		  width: 500,
		  click: function(e){
		  	var latLng = e.latLng;
		  	var fLat = latLng.k
		  	var fLng = latLng.A;
		  	 modal_map_global= map_modal;
		  	 //deleteMarkers()
		  	$('#map_report').find('input[type="text"]#lat').val(fLat);
			$('#map_report').find('input[type="text"]#long').val(fLng);
		  	initialize(latLng , modal_map_global);
		  }
		});

	}
	
	function initialize(oData, modal_map_global) {
		if(typeof(oData) !='undefined'){
			var uiMark;
			if(typeof(modal_map_global) !='undefined'){
				 modal_map_global.removeMarkers()
				var uiMarker = modal_map_global.addMarker({
					lat: oData.k,
					lng: oData.A,
					draggable: true
					/*,
					click:function(){
						
						

					},
					infoWindow: {
						content: "<p>TAPOS NA!</p>"
					} */
				});
			}
		}
    }
	initialize();

});