$(document).ready(function(){
	var map = new GMaps({
	  div: '#map',
	  lat: -12.043333,
	  lng: -77.028333,
	  draggable: true
	});


  	var oMap = $('#map_data').val();
  	obj = validate_json(oMap);
  	
  	if(typeof(obj) !='undefined'){
	  	$.each(obj, function(index , value){
	  		if(typeof(value.lat) !='undefined' || value.lat != "" || value.lat !=null &&
	  			typeof(value.long) !='undefined' || value.long != "" || value.long !=null){
	  			var iLat = value.lat;
	  			var iLong = value.long;
	  			if(typeof(value.title) !='undefined' && typeof(value.description) !='undefined'){
			  		map.addMarker({
						lat: iLat,
						lng: iLong,
						title: 'Lima',
						click: function(e) {
						},
						infoWindow: {
							content: "<p>title :"+value.title+"</p><p>description: "+value.description+"</p>"
						}
					});
			  	}
		  	}
	  	});
	}
	
  	

//gmap events

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
		  	$('#map_report').find('input[type="text"]#lat').val(fLat);
			$('#map_report').find('input[type="text"]#long').val(fLng);
		  	initialize(latLng , modal_map_global);
		  },
		  dragend: function(e){
		  	var latLng = e.latLng;
		  	var fLat = latLng.k;
		  	var fLng = latLng.A;
		  	$('#map_report').find('input[type="text"]#lat').val(fLat);
			$('#map_report').find('input[type="text"]#long').val(fLng);
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
				});
			}
		}
    }

    function validate_json(sData){

		try{
			if(sData.length > 2){
			}
		}
		catch(e){
			var sData = '{}';
		}
		oData = jQuery.parseJSON(sData);
		try{
			for(x in oData){
				break;
			}
		}
		catch(e){
			oData = {};
		}

		return oData;	
	}

	initialize();

});