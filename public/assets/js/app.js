$(document).ready(function(){


	$("html").niceScroll({cursorcolor:"#397F43"});
	$(".user .sidebar .reports .tab-content").niceScroll({cursorcolor:"#397F43"});
	$('#newest').click(function(){
		$('.trending').css({display:'none'});
		$('.newest').css({display:'block'});
	});
	$('#trending').click(function(){
		$('.trending').css({display:'block'});
		$('.newest').css({display:'none'});
	});

	var sUrl = window.location.host;

	var map = new GMaps({
	  el: '#map',
	  lat: -12.043333,
	  lng: -77.028333
	});

// geolocation

	GMaps.geolocate({
	  success: function(position) {
	  	console.log(JSON.stringify(position));
	    map.setCenter(position.coords.latitude, position.coords.longitude);
	  },
	  error: function(error) {
	    console.log('Geolocation failed: '+error.message);
	  },
	  not_supported: function() {
	    console.log("Your browser does not support geolocation");
	  },
	  always: function() {
	    console.log("Done!");
	  }
	});





  	var oMap = $('#map_data').val();
  	obj = validate_json(oMap);
  	draw_markers(obj);



  	function draw_markers(obj, month, year){
	  	if(typeof(obj) !='undefined'){	  		

		  	$.each(obj, function(index , value){
		  		if(typeof(value.lat) !='undefined' || value.lat != "" || value.lat !=null &&
		  			typeof(value.long) !='undefined' || value.long != "" || value.long !=null){
	
		  			if(typeof(value.title) !='undefined' && typeof(value.description) !='undefined'){
		  				
		  				var sDate = value.created_at;
		  				sDate =  sDate.split(' ')[0];
		  				var dDate = new Date(sDate);
		  				var str = dDate.toString("M yyyy");
		  				var iMonth = dDate.toString("M");
		  				var iYear = dDate.toString("yyyy");
		  				
		  					if(typeof(month) == 'undefined' || month == 0 ){
		  							if(year == null){
								  		add_mark(value);
								  	}else if(year == iYear){
								  		add_mark(value)
								  	}

							  	//}
						  	}else{
						  		if(iMonth == month && iYear == year){
						  			add_mark(value);
						  		}
						  	}
					  	
				  	}
			  	}
		  	});
		}
	}

	function add_mark(value){
		var sImg = value.image[0];
		var iLat = value.lat;
		var iLong = value.long;
		if(typeof(sImg) !='undefined' ||sImg.length > 0 || sImg !=""){
			map.addMarker({
				lat: iLat,
				lng: iLong,
				title: value.title,
				click: function(e) {
				},
				infoWindow: {
					content: "<div style='height:auto; max-width:400px; min-width:300px;'><div style='width:400px; height:200px; overflow: hidden;'><img src='"+sImg +"' height='auto' width='100%'></div><h4>"+value.title+"</h4><p>"+value.description+"</p><p>"+value.created_at+"month >>> </p></div>"
				}
			});
		}
	}


	$('#date-filter, #year-filter').change(function(e){
		var iMonth = $('#date-filter').val();
		var iYear = $('#year-filter').val();
		map.removeMarkers();
		draw_markers(obj, iMonth, iYear);


	});
	$('#date-filter').trigger('change');

//gmap events

	var modal_map_global;

	$('a.btn[data-target="#map_report"]').click(function(){
		modal_map_int();
	});

	function modal_map_int(){
		setTimeout(function(){
			
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

			GMaps.geolocate({
			  success: function(position) {
			  	console.log(JSON.stringify(position));
			    map_modal.setCenter(position.coords.latitude, position.coords.longitude);
			  },
			  error: function(error) {
			    console.log('Geolocation failed: '+error.message);
			  },
			  not_supported: function() {
			    console.log("Your browser does not support geolocation");
			  },
			  always: function() {

			    console.log("Done!");
			  }
			});
		},500)

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

	function initialize_year_filter(){
		var iYear = new Date().getFullYear();
		var sTemp = "";
		var iLast = iYear - 10;
		for(var x= iYear; x>=iLast;x--){
			sTemp +="<option value='"+x+"'>"+x+"</option>";
		}
		if(sTemp.length > 0){
			$(sTemp).appendTo('#year-filter')
		}
	}		
	initialize();
	initialize_year_filter();

});