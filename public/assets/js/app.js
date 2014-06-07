$(document).ready(function(){

	var map = new GMaps({
	  div: '#map',
	  lat: -12.043333,
	  lng: -77.028333,
	  draggable: true,
	  click: function(e){
	  	var latLng = e.latLng;
		console.log(JSON.stringify(latLng));
		var fLat = latLng.k;
		var fLng = latLng.A;
	  	initialize(latLng);
	  },
	  infoWindow: {
		  content: '<p>form</p>'
		},
	  map:map
	});

	/*
	map.addMarker({
        lat: -12.043333,
	  	lng: -77.028333,
	  	click:function(){
	  		console.log('test');
	  	},
	  	infoWindow: {
		  content: '<p>HTML Content</p>'
		}
    });
	*/

//gmap events

	var location;
	
	function initialize(oData) {
		if(typeof(oData) !='undefined'){
			map.addMarker({
				lat: oData.k,
				lng: oData.A,
				draggable: true,
				infoWindow: {
					content: "<p>TAPOS NA!</p>"
				}
			});
		}
		/*
	        google.maps.event.addListener(map, 'click', function(event) {
	            mapZoom = map.getZoom();
	            startLocation = event.latLng;
	            setTimeout("placeMarker()", 600);
	        });
	    map.addMarker({
	        lat: -12.043333,
		  	lng: -77.028333,
		  	click:function(){
		  		console.log('test');
		  	},
		  	infoWindow: {
			  content: '<p>HTML Content</p>'
			}
	    });
		*/
    }


	initialize();

});