/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.bootstrap_barrio_subtheme = {
    attach: function (context, settings) {
    	/* More Promotions */
    	$("#more_promotions").click(function() {
			$("#more").show();
			$("#button_more").hide();
			$("#button_less").show();
		});
		/* Less Promotions */
		$("#less_promotions").click(function() {
			$("#more").hide();
			$("#button_more").show();
			$("#button_less").hide();
		});
		/*To load for the first bus service*/
		var idSchedule = "#schedule_bus_9";
		var date = new Date();
			var day = date.getDate();
			var month = date.getMonth();
			month = (month + 1);
			if(month<10)
			{
				month = '0'+month;
			}
			var year = date.getFullYear();
			var dateNow = year+'-'+month+'-'+day;
		var urlTo = '/route_schedule_bus/9/'+dateNow;
		
		$.ajax({
          url: urlTo,
          success: function (response) {
          	$( idSchedule ).html(response);
          },
          error: function (error) {
            console.log(error);
          }
        });
		/*End*/
		//Show Tab Bus 
		$(".tabBus", context).once('a').click(function(e) {
			var tab = $(this).attr("href");
			var value = $(this).attr("value");
			//console.log("tab"+tab);
			//console.log("value"+value);
			$(".tab-pane").attr("class","tab-pane fade pl-md-4");
			$("#tabSelector"+value).attr("aria-selection","false");
			$(tab).attr("class","tab-pane show active fade pl-md-4");
			/* Schedule Bus */
			var id = $(this).attr("name");
			var idSchedule = "#schedule_bus_"+id;
			var date = new Date();
  			var day = date.getDate();
  			var month = date.getMonth();
  			month = (month + 1);
  			if(month<10)
  			{
  				month = '0'+month;
  			}
  			var year = date.getFullYear();
  			var dateNow = year+'-'+month+'-'+day;
			var urlTo = '/route_schedule_bus/'+id+'/'+dateNow;
			
			$.ajax({
	          url: urlTo,
	          success: function (response) {
	          	$( idSchedule ).html(response);
	          },
	          error: function (error) {
	            console.log(error);
	          }
	        });
			
		});
		
		/* Button Search Click */
		$("#buttonSearchTrip").once('button').click(function() {
			var origin = $( "select#originCity" ).val();
			var originName = $('#originCity option:selected').text();
			var destiny = $( "select#destinyCity" ).val();
			var destinyName = $('#destinyCity option:selected').text();
			var dateSplit = $( "#fromof" ).val();
			var dateSplitBack = $( "#cameof" ).val();
			//
			if(dateSplit=='' && dateSplitBack=='')
			{
				var dateSplit = new Date();
  				var day = dateSplit.getDate();
  				if(day<=9)
  				{
  					var dayF = '0'+day;
  				}
  				else
  				{
  					var dayF = dayF;
  				}
  				var month = dateSplit.getMonth();
  				if(month<=9)
  				{
  					var monthF = month+1;
  					monthF = '0'+monthF;
  				}
  				else
  				{
  					var monthF = month+1;
  				}
				var year = dateSplit.getFullYear();
				var dateGo = dayF+'-'+monthF+'-'+year;
				var dateBack = 0;
			}
			else if(dateSplit!='' && dateSplitBack=='')
			{
				var dateSplit = dateSplit.split('-');
				var dateGo = dateSplit[2]+'-'+dateSplit[1]+'-'+dateSplit[0];
				var dateBack = 0;
			}
			else if(dateSplit=='' && dateSplitBack!='')
			{
				var dateSplit = new Date();
  				var day = dateSplit.getDate();
  				if(day<=9)
  				{
  					var dayF = '0'+day;
  				}
  				else
  				{
  					var dayF = dayF;
  				}
  				var month = dateSplit.getMonth();
  				if(month<=9)
  				{
  					var monthF = month+1;
  					monthF = '0'+monthF;
  				}
  				else
  				{
  					var monthF = month+1;
  				}
				var year = dateSplit.getFullYear();
				var dateGo = dayF+'-'+monthF+'-'+year;
				var dateSplitBack = dateSplitBack.split('-');
				var dateBack = dateSplitBack[2]+'-'+dateSplitBack[1]+'-'+dateSplitBack[0];
			}
			else if(dateSplit!='' && dateSplitBack!='')
			{
				var dateSplit = dateSplit.split('-');
				var dateGo = dateSplit[2]+'-'+dateSplit[1]+'-'+dateSplit[0];
				var dateSplitBack = dateSplitBack.split('-');
				var dateBack = dateSplitBack[2]+'-'+dateSplitBack[1]+'-'+dateSplitBack[0];
			}
			window.location.href = '/pages/reservation/'+origin+'/'+originName+'/'+destiny+'/'+destinyName+'/'+dateGo+'/'+dateBack;
		});
		/* Button Tours Click */
		$("#buttonSearchTour").once('button').click(function() {
			window.open('https://www.priceres.co/bolivariano/hoteles','_blank');
		});
		/* Button Tours Click */
		$("#buttonSearchTourM").once('button').click(function() {
			window.open('https://www.priceres.co/bolivariano/hoteles','_blank');
		});
		/* Ajax Department Filter Agencies  */
		$("#department_filter", context).once('select').change(function() {
			$('#city_filter_department').empty();
			var department = $( "#department_filter" ).val();
			$('#city_filter_department').append('<option value="0">-Todas-</option>');
			$("#city_filter option").each(function(){
				if($(this).attr('value') == department)
				{	
					//alert('<option value="'+$(this).attr('value')+'">'+$(this).text()+'</option>');
			   		$('#city_filter_department').append('<option value="'+$(this).text()+'">'+$(this).text()+'</option>');
			  	} 		
			});
			$('#city_filter').hide();
			$('#div_city_filter_department').show();
		});
		/* Filter Agencies Click */
		$("#filter_agencies", context).once('button').click(function(e) {
			var department = $( "#department_filter" ).val();
			var city = $( "#city_filter_department" ).val();
			if(department!=0)
			{
				window.location.href = '/pages/agencies/filter/'+department+'/'+city;
			}
			
		});
		/*Change Select Routes*/
		$("#origin_filter", context).once('select').change(function() {
			$('#destiny').empty();
			var origin = $( "#origin_filter" ).val();
			var urlTo = '/route_filter/'+origin;
			$.ajax({
	          url: urlTo,
	          success: function (response) {
	          	$( "#destiny" ).hide();
	            $( "#destiny_filter_select" ).html(response);
	            $( "#destiny_filter_select" ).show();
	          },
	          error: function (error) {
	            console.log(error);
	          }
	        });
		});
		/**/
		/* Filter Routes Click */
		$("#filter_routes", context).once('button').click(function(e) {
			var origin = $( "#origin_filter" ).val();
			var destiny = $( "#destiny_filter" ).val();
			if(origin==0)
			{
				$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar una opción de Origen.</div>');
    			$( "#messagePop" ).show();
			}
			else if(destiny==0)
			{
				$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar una opción de Destino.</div>');
    			$( "#messagePop" ).show();
			}
			else if(origin!=0 && destiny!=0)
			{
				window.location.href = '/pages/routes/'+origin+'_'+destiny;
			}
			
		});
		/* On Board Click */
		$(".onBoardImg", context).once('a').click(function(e) {
			var tab = $(this).attr("value");
			$( ".onBoardDesc" ).hide();
			$( ".onBoardImgs" ).hide();
			$( "#"+tab+"_gallery" ).show();
			$( "#"+tab ).show();
		});
		/* Trip Rate Tab Click */
		$(".rateTripGo", context).once('a').click(function(e) {
			var tab = $(this).attr("href");
			var dateSplit = $(this).attr("value");
			
			var origin = $( "#idCityOrigin" ).val();
			var originName = $( "#cityOrigin" ).val();
			var destiny = $( "#idCityDestiny" ).val();
			var destinyName = $( "#cityDestiny" ).val();
			var dateSplit = dateSplit.split('/');
			var dateGo = dateSplit[0]+'-'+dateSplit[1]+'-'+dateSplit[2];
			$( "#tripDateGo" ).val(dateSplit[2]+'-'+dateSplit[1]+'-'+dateSplit[0]);
			var dateBack = 0;
			var urlTo = '/tab_reservation_go/'+origin+'/'+originName+'/'+destiny+'/'+destinyName+'/'+dateGo+'/'+dateBack;
			$( "#nav-tabContent" ).hide();
			$.ajax({
	          url: urlTo,
	          success: function (response) {
	            $(tab).html(response);
	            $( "#nav-tabContent" ).show();
	          },
	          error: function (error) {
	            console.log(error);
	          }
	        });
		});
		/* Trip Rate Tab Click */
		$(".rateTripBack", context).once('a').click(function(e) {
			var tab = $(this).attr("href");
			var dateSplit = $(this).attr("value");
			
			var origin = $( "#idCityDestiny" ).val();
			var originName = $( "#cityDestiny" ).val();
			var destiny = $( "#idCityOrigin" ).val();
			var destinyName = $( "#cityOrigin" ).val();
			var dateSplit = dateSplit.split('/');
			var dateGo = 0;
			$( "#tripDateBack" ).val(dateSplit[2]+'-'+dateSplit[1]+'-'+dateSplit[0]);
			var dateBack = dateSplit[0]+'-'+dateSplit[1]+'-'+dateSplit[2];
			var urlTo = '/tab_reservation_back/'+origin+'/'+originName+'/'+destiny+'/'+destinyName+'/'+dateGo+'/'+dateBack;
			$( "#nav-tabContentB" ).hide();
			$.ajax({
	          url: urlTo,
	          success: function (response) {
	            $(tab).html(response);
	            $( "#nav-tabContentB" ).show();
	          },
	          error: function (error) {
	            console.log(error);
	          }
	        });
		});
		/* Select Chair Trip */
    	$("#selectChairTrip", context).once('input').click(function() {
    		var origin = $( "#idCityOrigin" ).val();
			var originName = $( "#cityOrigin" ).val();
			var destiny = $( "#idCityDestiny" ).val();
			var destinyName = $( "#cityDestiny" ).val();
			var tripDateGo = $( "#tripDateGo" ).val();
			var tripDateBack = $( "#tripDateBack" ).val();
			//var dateSplit = dateSplit.split('/');
			//var tripDateGo = dateSplit[0]+'-'+dateSplit[1]+'-'+dateSplit[2];
			//var dateSplitB = dateSplitB.split('/');
			//var tripDateBack = dateSplitB[0]+'-'+dateSplitB[1]+'-'+dateSplitB[2];
			
    		if($("[name=trip_go]:checked").is(':checked')==false)
    		{
    			$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar una opción de Salida: '+originName+' - '+destinyName+'.</div>');
    			$( "#messagePop" ).show();	
    			//return false;
    		}
    		if($( "#tripDateBack" ).val()!=0)
    		{
    			if($("[name=trip_go]:checked").is(':checked')==false && $("[name=trip_back]:checked").is(':checked')==false)
	    		{
	    			$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar una opción de Salida y Regreso.</div>');
	    			$( "#messagePop" ).show();
	    		}
	    		if($("[name=trip_go]:checked").is(':checked')==true && $("[name=trip_back]:checked").is(':checked')==false)
	    		{
	    			$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar una opción de Regreso: '+destinyName+' - '+originName+'.</div>');
	    			$( "#messagePop" ).show();
	    		}
	    		if($("[name=trip_go]:checked").is(':checked')==false && $("[name=trip_back]:checked").is(':checked')==true)
	    		{
	    			$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar una opción de Salida: '+originName+' - '+destinyName+'.</div>');
	    			$( "#messagePop" ).show();
	    		}
    		}
    		if($("[name=trip_go]:checked").is(':checked')==true && $( "#tripDateBack" ).val()==0)
    		{
    			var tripKeyGo = $("[name=trip_go]:checked").val();
    			var idCapacity = "#capacity_go_"+tripKeyGo;
    			var idService = "#bus_service_go_"+tripKeyGo;
    			var tripCapacity = $( idCapacity ).val();
    			var tripService = $( idService ).val();

    			window.location.href = '/pages/selection/'+origin+'/'+originName+'/'+destiny+'/'+destinyName+'/'+tripDateGo+'/'+tripKeyGo+'/'+tripCapacity+'/'+tripService;
    		}
    		if($("[name=trip_go]:checked").is(':checked')==true && $("[name=trip_back]:checked").is(':checked')==true)
    		{
    			var dateGo = $( "#tripDateGo" ).val();
    			var dateBack = $( "#tripDateBack" ).val();
    			if(dateGo<dateBack)
    			{
	    			var tripKeyGo = $("[name=trip_go]:checked").val();
	    			var idCapacityGo = "#capacity_go_"+tripKeyGo;
	    			var idServiceGo = "#bus_service_go_"+tripKeyGo;
	    			var tripCapacityGo = $( idCapacityGo ).val();
	    			var tripServiceGo = $( idServiceGo ).val();
	    			//Back
	    			var tripKeyBack = $("[name=trip_back]:checked").val();
	    			var idCapacityBack = "#capacity_back_"+tripKeyBack;
	    			var idServiceBack = "#bus_service_back_"+tripKeyBack;
	    			var tripCapacityBack = $( idCapacityBack ).val();
	    			var tripServiceBack = $( idServiceBack ).val();

	    			window.location.href = '/pages/selection/'+origin+'/'+originName+'/'+destiny+'/'+destinyName+'/'+tripDateGo+'/'+tripKeyGo+'/'+tripCapacityGo+'/'+tripServiceGo+'/'+tripDateBack+'/'+tripKeyBack+'/'+tripCapacityBack+'/'+tripServiceBack;
    			}
    			else
    			{
    				$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">La Fecha de Regreso no debe ser mayor a la Fecha de Salida.</div>');
	    			$( "#messagePop" ).show();
    			}
    			
    		}
		});
		/* Select Chair Trip */
    	$("#backHome").click(function() {
			window.location.href = '/';
		});
		/* Show Password Click */
		$("#btnShowPassword").click(function() {
			var x = document.getElementById("edit-pass");
			  if (x.type === "password") {
			    x.type = "text";
			  } else {
			    x.type = "password";
			  }
		});
		/* Show Password Click Change Password Input One */
		$("#btnShowPassword1").click(function() {
			var x = document.getElementById("edit-pass-pass1");
			  if (x.type === "password") {
			    x.type = "text";
			  } else {
			    x.type = "password";
			  }
		});
		/* Show Password Click Change Password Input Two */
		$("#btnShowPassword2").click(function() {
			var x = document.getElementById("edit-pass-pass2");
			  if (x.type === "password") {
			    x.type = "text";
			  } else {
			    x.type = "password";
			  }
		});
		$("#checkout").once('button').click(function() {
			console.log('Entra a Checkout Final');
		});
		/*End*/
		/*******
		// Note: This example requires that you consent to location sharing when
	      // prompted by your browser. If you see the error "The Geolocation service
	      // failed.", it means you probably did not give permission for the browser to
	      // locate you.
	      var map, infoWindow;
	      function initMap() {
	        map = new google.maps.Map(document.getElementById('map_home'), {
	          center: {lat: -34.397, lng: 150.644},
	          zoom: 6
	        });
	        infoWindow = new google.maps.InfoWindow;

	        // Try HTML5 geolocation.
	        if (navigator.geolocation) {
	          navigator.geolocation.getCurrentPosition(function(position) {
	            var pos = {
	              lat: position.coords.latitude,
	              lng: position.coords.longitude
	            };

	            infoWindow.setPosition(pos);
	            infoWindow.setContent('Location found.');
	            infoWindow.open(map);
	            map.setCenter(pos);
	          }, function() {
	            handleLocationError(true, infoWindow, map.getCenter());
	          });
	        } else {
	          // Browser doesn't support Geolocation
	          handleLocationError(false, infoWindow, map.getCenter());
	        }
	      }

	      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	        infoWindow.setPosition(pos);
	        infoWindow.setContent(browserHasGeolocation ?
	                              'Error: The Geolocation service failed.' :
	                              'Error: Your browser doesn\'t support geolocation.');
	        infoWindow.open(map);
	      }
		*/
    }
  };



})(jQuery, Drupal);
