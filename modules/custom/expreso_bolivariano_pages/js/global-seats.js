/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal, drupalSettings) {

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

		$("#backSelection").once('button').click(function() {
			window.history.back();
		});
		

		/*Trip Dates*/
		var mesNameGo = '';
		var mesNameBack = '';
		var dateGo = $('#tripDateGo').val();
		var resGo = dateGo.split("-");
		var anioGo = resGo[0];
		var mesGo = resGo[1]; if(mesGo=='01'){ mesNameGo = 'Enero'; } if(mesGo=='02'){ mesNameGo = 'Febrero'; } if(mesGo=='03'){ mesNameGo = 'Marzo'; } if(mesGo=='04'){ mesNameGo = 'Abril'; } if(mesGo=='05'){ mesNameGo = 'Mayo'; } if(mesGo=='06'){ mesNameGo = 'Junio'; }
		if(mesGo=='07'){ mesNameGo = 'Julio'; } if(mesGo=='08'){ mesNameGo = 'Agosto'; } if(mesGo=='09'){ mesNameGo = 'Septiembre'; } if(mesGo=='10'){ mesNameGo = 'Octubre'; } if(mesGo=='11'){ mesNameGo = 'Noviembre'; } if(mesGo=='12'){ mesNameGo = 'Diciembre'; }
		var diaGo = resGo[2];
		var finalDateGo = diaGo+' de '+mesNameGo+' del '+anioGo;
		$('#dateTripGo').html(finalDateGo);
		var dateBack = $('#tripDateBack').val();
		if(dateBack!='')
		{
			var resBack = dateBack.split("-");
			var anioBack = resBack[0];
			var mesBack = resBack[1]; if(mesBack=='01'){ mesNameBack = 'Enero'; } if(mesBack=='02'){ mesNameBack = 'Febrero'; } if(mesBack=='03'){ mesNameBack = 'Marzo'; } if(mesBack=='04'){ mesNameBack = 'Abril'; } if(mesBack=='05'){ mesNameBack = 'Mayo'; } if(mesBack=='06'){ mesNameBack = 'Junio'; }
			if(mesBack=='07'){ mesNameBack = 'Julio'; } if(mesBack=='08'){ mesNameBack = 'Agosto'; } if(mesBack=='09'){ mesNameBack = 'Septiembre'; } if(mesBack=='10'){ mesNameBack = 'Octubre'; } if(mesBack=='11'){ mesNameBack = 'Noviembre'; } if(mesBack=='12'){ mesNameBack = 'Diciembre'; }
			var diaBack = resBack[2];
			var finalDateBack = diaBack+' de '+mesNameBack+' del '+anioBack;
			$('#dateTripBack').html(finalDateBack);
		}
		else
		{
			$(".trip__regreso").hide();
		}
		/*End*/

		var tripService = $('#tripService').val();
		if(tripService=='2' || tripService=='3')
		{
			$('#floor1').css("padding-bottom", "200px");
			$('#floor1').css("padding-top", "100px");
			$('#seats__bus_f1').css("padding-top", "0px");
    		$('#seats__bus_f1').css("padding-left", "0px");
    		$('#floor2').css("padding-top", "0px");
    		$('#division').hide();
		}
		else if(tripService=='9')
		{
			$('#seats__bus_f1').css("padding-top", "200px");
    		$('#seats__bus_f1').css("padding-left", "100px");
    		$('#floor2').css("padding-top", "10px");
    		$('#division').show();
		}
		else
		{
			$('#floor1').css("padding-bottom", "100px");
			$('#floor1').css("padding-top", "50px");
			$('#seats__bus_f1').css("padding-top", "0px");
    		$('#seats__bus_f1').css("padding-left", "0px");
    		$('#floor2').css("padding-top", "0px");
    		$('#division').hide();
		}
		/* Recieve the Javascript variables */
		var chairsMapFirst = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.chairsMapFirstFloor;
		var chairsMapSecond = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.chairsMapSecondFloor;
		var countColumns = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countColumnsFF;
		var countColumnsS = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countColumnsSF;
		var countRows = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countRowsFF;
		var countRowsS = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countRowsSF;
		var countRates = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countRates;
		var countBlocked = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countBlocked;
		/*For Back options*/
		var tripBack = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.tripBackT;
		//console.log(countRows);

		if(tripBack=='n')
		{
			var countRowsSB = 0;
		}
		if(tripBack=='y')
		{
			$('#backTravel').show();
			$('#backTravel').css("padding-top", "50px");
			var tripServiceB = $('#tripServiceBack').val();
			if(tripServiceB=='2' || tripServiceB=='3')
			{
				$('#floor1b').css("padding-bottom", "200px");
				$('#floor1b').css("padding-top", "100px");
				$('#seats__bus_f1b').css("padding-top", "0px");
	    		$('#seats__bus_f1b').css("padding-left", "0px");
	    		$('#floor2b').css("padding-top", "0px");
	    		$('#divisionb').hide();
			}
			else if(tripServiceB=='9')
			{
				$('#seats__bus_f1b').css("padding-top", "200px");
	    		$('#seats__bus_f1b').css("padding-left", "100px");
	    		$('#floor2b').css("padding-top", "50px");
	    		$('#divisionb').show();
			}
			else
			{
				$('#floor1b').css("padding-bottom", "100px");
				$('#floor1b').css("padding-top", "50px");
				$('#seats__bus_f1b').css("padding-top", "0px");
	    		$('#seats__bus_f1b').css("padding-left", "0px");
	    		$('#floor2b').css("padding-top", "0px");
	    		$('#divisionb').hide();
	    	}
	    	//All variables
			var chairsMapFirstB = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.chairsMapFirstFloorB;
			var chairsMapSecondB = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.chairsMapSecondFloorB;
			var countColumnsB = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countColumnsFFB;
			var countColumnsSB = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countColumnsSFB;
			var countRowsB = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countRowsFFB;
			var countRowsSB = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countRowsSFB;
			var countRatesB = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countRatesB;
			var countBlockedB = drupalSettings.bootstrap_bolivariano_subtheme.seatCharts.countBlockedB;
			var seatsJSONB = JSON.parse(countRatesB);
			var $total_p1b = $('#totalp1b');
        	var $total_p2b = $('#totalp2b');
        	var $totalp1b = 0;
        	var $totalp2b = 0;
	    	//End
	    	//console.log(chairsMapFirstB);
		}
		//console.log(countRowsSB.length);
		//console.log(countBlocked);
		//console.log(countRowsSB.length);
		/*End*/
		var seatsJSON = JSON.parse(countRates);

		//console.log(countBlocked);
		//console.log(countBlockedB);

		var $cart = $('#selected-seats');
        var $counter = $('#counter');
        var $counterBack = $('#counterBack');
        var $total = $('#total');
        var $total_p1 = $('#totalp1');
        var $total_p2 = $('#totalp2');
        var $totalp1 = 0;
        var $totalp2 = 0;

        if(tripBack=='n')
        {
	        if(chairsMapFirst.length!=0)
	        {
	        	var piso1 = $('#seat-map').seatCharts({
			        map: chairsMapFirst,
			        seats : seatsJSON,
			        naming : {
			            top : false,
			            left: false,
			            columns:countColumns,
			            rows:countRows,
			            getId  : function(character, row, column) {
			                if(tripService==3)
			            	{
			            		if(column=='C' || column=='D')
			            		{
			            			var rowN = '0'+(row-1);
			            			return  column +''+ rowN ; 
			            		}
			            		else
			            		{
			            			return  column +''+ row ;	
			            		}
			            	}
			                else
			                {
			                	return  column +''+ row ;
			                }
			            },
			            getLabel : function (character, row, column) {
			            	if(tripService==3)
			            	{
			            		if(column=='C' || column=='D')
			            		{
			            			var rowN = '0'+(row-1);
			            			return  column +''+ rowN ; 
			            		}
			            		else
			            		{
			            			return  column +''+ row ;	
			            		}
			            	}
			                else
			                {
			                	return  column +''+ row ;
			                }
			            }
			        },
			        legend : {
			            node : $('#legend'),
			            items : [
			                [ 'e', 'available',   'Tarifa Espectacular' ],
			                [ 'c', 'available',   'Tarifa Comoda'],
			                [ 'v', 'available',   'Tarifa Chevere' ],
			                [ 'p', 'available',   'Tarifa Primera Clase'],
			                [ 'u', 'unavailable', 'No disponible'],
			                [ 's', 'selected', 'Seleccionada']
			            ]                   
			        },
			        click: function () {
			            var counterText = $counter.text();
			            $( "#messagePop" ).hide();
			            if (this.status() == 'available') 
			            {
			            	if(counterText<3)
		            		{
			            		var countT = (parseInt(counterText)+1);
				            	//let's create a new <li> which we'll add to the cart items
				                $('<tr class="seatchart__row"><td class="seatchart__col">'+this.settings.label+'</td><td class="seatchart__col">'+this.data().category+'</td><td class="seatchart__col"><b>$ '+this.data().price.toLocaleString('es-CO')+'</b></td></tr>')
				                    .attr('id', 'cart-item-'+this.settings.id)
				                    .data('seatId', this.settings.id)
				                    .appendTo($cart);

				                $counter.text(piso1.find('selected').length+1);
				                $totalp1 = recalculateTotal(piso1)+this.data().price;
				                $total_p1.text($totalp1);
				                $total.text(($totalp2+$totalp1).toLocaleString('es-CO'));
				                
				                return 'selected';
			            	}
			            	else
			            	{
			            		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Solo puede seleccionar (3) sillas por Viaje.</div>');
		    					$( "#messagePop" ).show();
		    					return this.style();
			            	}
			            }
			            else if (this.status() == 'selected') 
			            {
			                //update the counter
			                $counter.text(piso1.find('selected').length-1);
			                //and total

			                $totalp1 = recalculateTotal(piso1)-this.data().price;

			                $total_p1.text($totalp1);
			                $total.text(($totalp2+$totalp1).toLocaleString('es-CO'));
			            
			                //remove the item from our cart
			                $('#cart-item-'+this.settings.id).remove();
			            
			                //seat has been vacated
			                return 'available';
			            } 
			            else if (this.status() == 'unavailable') 
			            {
			                //seat has been already booked
			                return 'unavailable';
			            } 
			            else 
			            {
			                return this.style();
			            }
			        }/*,
					focus: function() {
						//The only place where you should return actual seat status
						//return 
						$('[data-toggle="tooltip"]').tooltip(this.data().price.toLocaleString('es-CO'));
					}*/
			    });
			}
	        //If Floor 2 is different to 0
	        if(countRowsS.length!=1)
	        {
	        	$("#floor2").show();
	        	var piso2 = $('#seat-map2').seatCharts({
			        map: chairsMapSecond,
			        seats : seatsJSON,
			        naming : {
			            top : false,
			            left: false,
			            columns:countColumnsS,
			            rows:countRowsS,
			            getId  : function(character, row, column) {
			                return  column +''+ row ;
			            },
			            getLabel : function (character, row, column) {
			                return  column +''+ row ;
			            }
			        },
			        legend : {
			            node : $('#legend'),
			            items : [
			                [ 'e', 'available',   'Tarifa Espectacular' ],
			                [ 'c', 'available',   'Tarifa Comoda'],
			                [ 'v', 'available',   'Tarifa Chevere' ],
			                [ 'p', 'available',   'Tarifa Primera Clase'],
			                [ 'u', 'unavailable', 'No disponible'],
			                [ 's', 'selected', 'Seleccionada']
			            ]                   
			        },
			        click: function () {
			        	var counterText = $counter.text();
			            $( "#messagePop" ).hide();
			            if (this.status() == 'available') 
			            {
			            	if(counterText<3)
		            		{
			            		var countT = (parseInt(counterText)+1);
				            	//let's create a new <li> which we'll add to the cart items
				                $('<tr class="seatchart__row"><td class="seatchart__col">'+this.settings.label+'</td><td class="seatchart__col">'+this.data().category+'</td><td class="seatchart__col"><b>$ '+this.data().price.toLocaleString('es-CO')+'</b></td></tr>')
				                    .attr('id', 'cart-item-'+this.settings.id)
				                    .data('seatId', this.settings.id)
				                    .appendTo($cart);

				                $counter.text(piso1.find('selected').length+piso2.find('selected').length+1);
				                $totalp2 = recalculateTotal(piso2)+this.data().price;
				                $total_p2.text($totalp2);
				                $total.text(($totalp2+$totalp1).toLocaleString('es-CO'));
				                
				                return 'selected';
				            }
			            	else
			            	{
			            		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Solo puede seleccionar (3) sillas por Viaje.</div>');
		    					$( "#messagePop" ).show();
		    					return this.style();
			            	}
			            } 
			            else if (this.status() == 'selected') 
			            {
			                //update the counter
			                $counter.text(piso2.find('selected').length-1);
			                //and total

			                $totalp2 = recalculateTotal(piso2)-this.data().price;

			                $total_p2.text($totalp2);
			                $total.text(($totalp2+$totalp1).toLocaleString('es-CO'));
			            
			                //remove the item from our cart
			                $('#cart-item-'+this.settings.id).remove();
			            
			                //seat has been vacated
			                return 'available';
			            } 
			            else if (this.status() == 'unavailable') 
			            {
			                //seat has been already booked
			                return 'unavailable';
			            } 
			            else 
			            {
			                return this.style();
			            }
			        }
			    });
	        }
    	}
    	else
    	{
    		if(chairsMapFirst.length!=0)
	        {
	        	var piso1 = $('#seat-map').seatCharts({
			        map: chairsMapFirst,
			        seats : seatsJSON,
			        naming : {
			            top : false,
			            left: false,
			            columns:countColumns,
			            rows:countRows,
			            getId  : function(character, row, column) {
			                return  column +''+ row ;
			            },
			            getLabel : function (character, row, column) {
			                return  column +''+ row ;
			            }
			        },
			        legend : {
			            node : $('#legend'),
			            items : [
			                [ 'e', 'available',   'Tarifa Espectacular' ],
			                [ 'c', 'available',   'Tarifa Comoda'],
			                [ 'v', 'available',   'Tarifa Chevere' ],
			                [ 'p', 'available',   'Tarifa Primera Clase'],
			                [ 'u', 'unavailable', 'No disponible'],
			                [ 's', 'selected', 'Seleccionada']
			            ]                   
			        },
			        click: function () {
			            var counterText = $counter.text();
			            $( "#messagePop" ).hide();
			            if (this.status() == 'available') 
			            {
			            	if(counterText<3)
		            		{
			            		var countT = (parseInt(counterText)+1);
				            	//let's create a new <li> which we'll add to the cart items
				                $('<tr class="seatchart__row"><td class="seatchart__col">'+this.settings.label+'</td><td class="seatchart__col">'+this.data().category+'</td><td class="seatchart__col"><b>$ '+this.data().price.toLocaleString('es-CO')+'</b></td></tr>')
				                    .attr('id', 'cart-item-'+this.settings.id)
				                    .data('seatId', this.settings.id)
				                    .appendTo($cart);

				                $counter.text(piso1.find('selected').length+1);
				                $totalp1 = recalculateTotal(piso1)+this.data().price;
				                $total_p1.text($totalp1);
				                $total_p1b.text($totalp1b);
				                $total.text(($totalp1+$totalp1b).toLocaleString('es-CO'));
				                
				                return 'selected';
			            	}
			            	else
			            	{
			            		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Solo puede seleccionar (3) sillas por Viaje.</div>');
		    					$( "#messagePop" ).show();
		    					return this.style();
			            	}
			            }
			            else if (this.status() == 'selected') 
			            {
			                //update the counter
			                $counter.text(piso1.find('selected').length-1);
			                //and total

			                $totalp1 = recalculateTotal(piso1)-this.data().price;
			                $total_p1.text($totalp1);
			                $total_p1b.text($totalp1b);
				            $total.text(($totalp1+$totalp2+$totalp1b+$totalp2b).toLocaleString('es-CO'));
			            
			                //remove the item from our cart
			                $('#cart-item-'+this.settings.id).remove();
			            
			                //seat has been vacated
			                return 'available';
			            } 
			            else if (this.status() == 'unavailable') 
			            {
			                //seat has been already booked
			                return 'unavailable';
			            } 
			            else 
			            {
			                return this.style();
			            }
			        }
			    });
			}
	        /*If Floor 2 is different to 0*/
	        if(countRowsS.length!=1)
	        {
	        	$("#floor2").show();
	        	var piso2 = $('#seat-map2').seatCharts({
			        map: chairsMapSecond,
			        seats : seatsJSON,
			        naming : {
			            top : false,
			            left: false,
			            columns:countColumnsS,
			            rows:countRowsS,
			            getId  : function(character, row, column) {
			                return  column +''+ row ;
			            },
			            getLabel : function (character, row, column) {
			                return  column +''+ row ;
			            }
			        },
			        legend : {
			            node : $('#legend'),
			            items : [
			                [ 'e', 'available',   'Tarifa Espectacular' ],
			                [ 'c', 'available',   'Tarifa Comoda'],
			                [ 'v', 'available',   'Tarifa Chevere' ],
			                [ 'p', 'available',   'Tarifa Primera Clase'],
			                [ 'u', 'unavailable', 'No disponible'],
			                [ 's', 'selected', 'Seleccionada']
			            ]                   
			        },
			        click: function () {
			        	//console.log('Click 3');
			        	var counterText = $counter.text();
			            $( "#messagePop" ).hide();
			            if (this.status() == 'available') 
			            {
			            	if(counterText<3)
		            		{
			            		var countT = (parseInt(counterText)+1);
				            	//let's create a new <li> which we'll add to the cart items
				                $('<tr class="seatchart__row"><td class="seatchart__col">'+this.settings.label+'</td><td class="seatchart__col">'+this.data().category+'</td><td class="seatchart__col"><b>$ '+this.data().price.toLocaleString('es-CO')+'</b></td></tr>')
				                    .attr('id', 'cart-item-'+this.settings.id)
				                    .data('seatId', this.settings.id)
				                    .appendTo($cart);

				                $counter.text(piso1.find('selected').length+piso2.find('selected').length+1);
				                $totalp2 = recalculateTotal(piso2)+this.data().price;
				                $total_p2.text($totalp2);
				                $total.text(($totalp1+$totalp2+$totalp1b+$totalp2b).toLocaleString('es-CO'));
				                
				                return 'selected';
			            	}
			            	else
			            	{
			            		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Solo puede seleccionar (3) sillas por Viaje.</div>');
		    					$( "#messagePop" ).show();
		    					return this.style();
			            	}
			            } 
			            else if (this.status() == 'selected') 
			            {
			                //update the counter
			                $counter.text(piso2.find('selected').length-1);
			                //and total

			                $totalp2 = recalculateTotal(piso2)-this.data().price;
			                $total_p2.text($totalp2);
			                //$total_p1.text($totalp1);
				            $total.text(($totalp1+$totalp2+$totalp1b+$totalp2b).toLocaleString('es-CO'));
			            
			                //remove the item from our cart
			                $('#cart-item-'+this.settings.id).remove();
			            
			                //seat has been vacated
			                return 'available';
			            } 
			            else if (this.status() == 'unavailable') 
			            {
			                //seat has been already booked
			                return 'unavailable';
			            } 
			            else 
			            {
			                return this.style();
			            }
			        }
			    });
	        }
	        /*Back*/
	        if(chairsMapFirstB.length!=0)
	        {
	        	var piso1b = $('#seat-mapb').seatCharts({
			        map: chairsMapFirstB,
			        seats : seatsJSONB,
			        naming : {
			            top : false,
			            left: false,
			            columns:countColumnsB,
			            rows:countRowsB,
			            getId  : function(character, row, column) {
			                return  column +''+ row ;
			            },
			            getLabel : function (character, row, column) {
			                return  column +''+ row ;
			            }
			        },
			        legend : {
			            node : $('#legend'),
			            items : [
			                [ 'e', 'available',   'Tarifa Espectacular' ],
			                [ 'c', 'available',   'Tarifa Comoda'],
			                [ 'v', 'available',   'Tarifa Chevere' ],
			                [ 'p', 'available',   'Tarifa Primera Clase'],
			                [ 'u', 'unavailable', 'No disponible'],
			                [ 's', 'selected', 'Seleccionada']
			            ]                   
			        },
			        click: function () {
			        	//console.log('Click 2');
			        	//console.log('Entro a Click');
			            var counterTextBack = $counterBack.text();
			            $( "#messagePop" ).hide();
			            if (this.status() == 'available') 
			            {
			            	if(counterTextBack<3)
		            		{
			            		var countT = (parseInt(counterTextBack)+1);
				            	//let's create a new <li> which we'll add to the cart items
				                $('<tr class="seatchart__row"><td class="seatchart__col">'+this.settings.label+'</td><td class="seatchart__col">'+this.data().category+'</td><td class="seatchart__col"><b>$ '+this.data().price.toLocaleString('es-CO')+'</b></td></tr>')
				                    .attr('id', 'cart-item-'+this.settings.id)
				                    .data('seatId', this.settings.id)
				                    .appendTo($cart);

				                $counterBack.text(piso1b.find('selected').length+1);
				                $totalp1b = recalculateTotal(piso1b)+this.data().price;
				                $total_p1b.text($totalp1b);
				                //console.log($totalp1b);
				                $total.text(($totalp1+$totalp2+$totalp1b+$totalp2b).toLocaleString('es-CO'));
				                
				                return 'selected';
			            	}
			            	else
			            	{
			            		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Solo puede seleccionar (3) sillas por Viaje.</div>');
		    					$( "#messagePop" ).show();
		    					return this.style();
			            	}
			            }
			            else if (this.status() == 'selected') 
			            {
			                //update the counter
			                $counterBack.text(piso1b.find('selected').length-1);
			                //and total

			                //$totalp1 = recalculateTotal(piso1)-this.data().price;
			                $totalp1b = recalculateTotal(piso1b)-this.data().price;

			                $total_p1b.text($totalp1b);
			                $total.text(($totalp1+$totalp2+$totalp1b+$totalp2b).toLocaleString('es-CO'));
			            
			                //remove the item from our cart
			                $('#cart-item-'+this.settings.id).remove();
			            
			                //seat has been vacated
			                return 'available';
			            } 
			            else if (this.status() == 'unavailable') 
			            {
			                //seat has been already booked
			                return 'unavailable';
			            } 
			            else 
			            {
			                return this.style();
			            }
			        }
			    });
			}
	        /*If Floor 2 is different to 0*/
	        if(countRowsSB.length!=1)
	        {
	        	$("#floor2b").show();
	        	var piso2b = $('#seat-map2b').seatCharts({
			        map: chairsMapSecondB,
			        seats : seatsJSONB,
			        naming : {
			            top : false,
			            left: false,
			            columns:countColumnsSB,
			            rows:countRowsSB,
			            getId  : function(character, row, column) {
			                return  column +''+ row ;
			            },
			            getLabel : function (character, row, column) {
			                return  column +''+ row ;
			            }
			        },
			        legend : {
			            node : $('#legend'),
			            items : [
			                [ 'e', 'available',   'Tarifa Espectacular' ],
			                [ 'c', 'available',   'Tarifa Comoda'],
			                [ 'v', 'available',   'Tarifa Chevere' ],
			                [ 'p', 'available',   'Tarifa Primera Clase'],
			                [ 'u', 'unavailable', 'No disponible'],
			                [ 's', 'selected', 'Seleccionada']
			            ]                   
			        },
			        click: function () {
			        	//console.log('Click 100');
			        	var counterTextBack = $counterBack.text();
			            $( "#messagePop" ).hide();
			            if (this.status() == 'available') 
			            {
			            	if(counterTextBack<3)
		            		{
			            		var countT = (parseInt(counterTextBack)+1);
				            	//let's create a new <li> which we'll add to the cart items
				                $('<tr class="seatchart__row"><td class="seatchart__col">'+this.settings.label+'</td><td class="seatchart__col">'+this.data().category+'</td><td class="seatchart__col"><b>$ '+this.data().price.toLocaleString('es-CO')+'</b></td></tr>')
				                    .attr('id', 'cart-item-'+this.settings.id)
				                    .data('seatId', this.settings.id)
				                    .appendTo($cart);

				                $counterBack.text(piso1b.find('selected').length+piso2b.find('selected').length+1);
				                $totalp2b = recalculateTotal(piso2b)+this.data().price;
				                $total_p2b.text($totalp2b);
				                //console.log($totalp1b);
				                $total.text(($totalp1+$totalp2+$totalp1b+$totalp2b).toLocaleString('es-CO'));
				                
				                return 'selected';
			            	}
			            	else
			            	{
			            		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Solo puede seleccionar (3) sillas por Viaje.</div>');
		    					$( "#messagePop" ).show();
		    					return this.style();
			            	}
			            	
			            	//var countTicketsT = parseInt(countTickets) + parseInt(1);
			            	//$('#counter').attr("value",countTicketsT);
			                //let's create a new <li> which we'll add to the cart items
			                $('<tr class="seatchart__row"><td class="seatchart__col">'+this.settings.label+'</td><td class="seatchart__col">'+this.data().category+'</td><td class="seatchart__col"><b>$ '+this.data().price.toLocaleString('es-CO')+'</b></td></tr>')
			                    .attr('id', 'cart-item-'+this.settings.id)
			                    .data('seatId', this.settings.id)
			                    .appendTo($cart);
			                
			                /*
			                 * Lets update the counter and total
			                 *
			                 * .find function will not find the current seat, because it will change its stauts only after return
			                 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
			                 */
			                $counterBack.text(piso2b.find('selected').length+1);
			                $totalp2b = recalculateTotal(piso2b)+this.data().price;
			                $total_p2b.text($totalp2b);
			                $total.text(($totalp1+$totalp2+$totalp1b+$totalp2b).toLocaleString('es-CO'));
			                
			                return 'selected';
			            } 
			            else if (this.status() == 'selected') 
			            {
			                //update the counter
			                $counterBack.text(piso2b.find('selected').length-1);
			                //and total

			                $totalp2b = recalculateTotal(piso2b)-this.data().price;

			                $total_p2b.text($totalp2b);
			                $total.text(($totalp1+$totalp2+$totalp1b+$totalp2b).toLocaleString('es-CO'));
			            
			                //remove the item from our cart
			                $('#cart-item-'+this.settings.id).remove();
			            
			                //seat has been vacated
			                return 'available';
			            } 
			            else if (this.status() == 'unavailable') 
			            {
			                //seat has been already booked
			                return 'unavailable';
			            } 
			            else 
			            {
			                return this.style();
			            }
			        }
			    });
	        }
    	}
        //this will handle "[cancel]" link clicks
		$('#selected-seats').on('click', '.cancel-cart-item', function () {
			//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
			piso1.get($(this).parents('tr').data('seatId')).click();
		});
		if(tripBack=='n')
        {
	        if(chairsMapFirst.length!=0)
	        {
    			piso1.get(countBlocked).status('unavailable');
    		}
    		if(chairsMapFirst.length!=0 && countRowsS.length!=1)
    		{
    			piso1.get(countBlocked).status('unavailable');
    			piso2.get(countBlocked).status('unavailable');
    		}
    	}
		if(tripBack=='y')
        {
	        if(chairsMapFirst.length!=0)
	        {
    			piso1.get(countBlocked).status('unavailable');
    		}
    		if(chairsMapFirst.length!=0 && countRowsS.length!=1)
	        {
    			piso1.get(countBlocked).status('unavailable');
    			piso2.get(countBlocked).status('unavailable');
    		}
    		if(chairsMapFirstB.length!=0)
	        {
    			piso1b.get(countBlockedB).status('unavailable');
    		}
    		if(chairsMapFirstB.length!=0 && countRowsSB.length!=1)
	        {
    			piso1b.get(countBlockedB).status('unavailable');
    			piso2b.get(countBlockedB).status('unavailable');
    		}
    	}
		function recalculateTotal(sc) {
            var total = 0;
        
            //basically find every selected seat and sum its price
            sc.find('selected').each(function () {
            	
                total += this.data().price;
            });
            
            return total;
        }
        if(countRowsS.length==1)
        {
        	$("#floor2").hide();
        }
        if(countRowsSB.length==1)
        {
        	$("#floor2b").hide();
        }
        /*End*/

        $("#confirmSelection").once('button').click(function() {
        	$( "#messagePop" ).hide();
        	if(tripBack=='n')
        	{
        		//If Travel is Normal Bus
        		if(chairsMapFirst.length!=0 && countRowsS.length==1)
        		{
        			var chairsSelected = piso1.find('selected').length;
		        	if(chairsSelected==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else
	        		{
	        			//console.log('1');
	        			var tripKeyGo = $( "#tripKeyGo" ).val();
	        			var idCityOrigin = $( "#idCityOrigin" ).val();
	        			var idCityDestiny = $( "#idCityDestiny" ).val();
	        			var dateGo = $( "#tripDateGo" ).val();
	        			var chairsSelecteds = '';
	        			var end = piso1.find('selected').length;
	        			var i = 1;
				        piso1.find('selected').each(function () 
				        {
				        	if(i===end)
				        	{
				        		chairsSelecteds += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
			                i++;
			            });
				        var urlTo = '/create_reservation_one_way/'+idCityOrigin+'/'+idCityDestiny+'/'+chairsSelecteds+'/'+tripKeyGo+'/'+dateGo;
						//var urlTo = '';
						$( "#confirmSelection" ).attr("disabled", true);
						$.ajax({
				          url: urlTo,
				          success: function (response) {
				            if(response=='Error')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response=='Reservas')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Has superado el numero de Reservas por viaje y dia. Por favor realiza el pago de las Reservas que tienes.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response!='Error' || response!='Reservas')
				            {
				            	window.location.href = '/pages/checkout/'+response;
				            	//console.log(response);
				            	//console.log('2G Ida');
				            }
				          },
				          error: function (error) {
				            $( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    				$( "#messagePop" ).show();
				          }
				        });
	        		}
        		}
        		else if(chairsMapFirst.length!=0 && countRowsS.length!=1)
        		{
        			//If Travel is in Doble Bus
        			var chairsSelected = piso1.find('selected').length;
        			var chairsSelected2 = piso2.find('selected').length;
		        	if(chairsSelected==0 && chairsSelected2==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else
	        		{
	        			//console.log('2');
	        			var tripKeyGo = $( "#tripKeyGo" ).val();
	        			var idCityOrigin = $( "#idCityOrigin" ).val();
	        			var idCityDestiny = $( "#idCityDestiny" ).val();
	        			var dateGo = $( "#tripDateGo" ).val();
	        			var chairsSelecteds = '';
	        			var chairsSelecteds2 = '';
	        			var end = piso1.find('selected').length;
	        			var end2 = piso2.find('selected').length;
	        			var i = 1;
	        			var j = 1;
				        piso1.find('selected').each(function () 
				        {
				        	if(i===end && end2==0)
				        	{
				        		chairsSelecteds += this.settings.id;
				        	}
				        	else if(i===end && end2!=0)
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
				        	else
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
			                i++;
			            });
			            piso2.find('selected').each(function () 
				        {
				        	if(j===end2)
				        	{
				        		chairsSelecteds += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
			                j++;
			            });
				        var urlTo = '/create_reservation_one_way/'+idCityOrigin+'/'+idCityDestiny+'/'+chairsSelecteds+'/'+tripKeyGo+'/'+dateGo;
				        //var urlTo = '';
						$( "#confirmSelection" ).attr("disabled", true);
						$.ajax({
				          url: urlTo,
				          success: function (response) {
				            if(response=='Error')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response=='Reservas')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Has superado el numero de Reservas por dia. Por favor realiza el pago de las Reservas que tienes.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response!='Error' || response!='Reservas')
				            {
				            	window.location.href = '/pages/checkout/'+response;
				            	//console.log(response);
				            	//console.log('DuoBus Ida');
				            }
				          },
				          error: function (error) {
				            $( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    				$( "#messagePop" ).show();
				          }
				        });

	        		}
        		}
        	}
        	else
        	{
        		if(chairsMapFirst.length!=0 && countRowsS.length==1 && chairsMapFirstB.length!=0 && countRowsSB.length==1)
        		{
        			//If Travesl is Go Normal and Back Normal
        			var chairsSelected = piso1.find('selected').length;
        			var chairsSelectedB = piso1b.find('selected').length;
		        	if(chairsSelected==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else if(chairsSelectedB==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla de Regreso.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else
		        	{
		        		//console.log('3');
		        		var tripKeyGo = $( "#tripKeyGo" ).val();
		        		var tripKeyBack = $( "#tripKeyBack" ).val();
	        			var idCityOrigin = $( "#idCityOrigin" ).val();
	        			var idCityDestiny = $( "#idCityDestiny" ).val();
	        			var dateGo = $( "#tripDateGo" ).val();
	        			var dateBack = $( "#tripDateBack" ).val();
	        			var chairsSelecteds = '';
	        			var end = piso1.find('selected').length;
	        			var i = 1;
				        piso1.find('selected').each(function () 
				        {
				        	if(i===end)
				        	{
				        		chairsSelecteds += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
			                i++;
			            });
			            var chairsSelectedsBack = '';
			            var endBack = piso1b.find('selected').length;
	        			var j = 1;
				        piso1b.find('selected').each(function () 
				        {
				        	if(j===endBack)
				        	{
				        		chairsSelectedsBack += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelectedsBack += this.settings.id+',';
				        	}
			                j++;
			            });
				        var urlTo = '/create_reservation_two_way/'+idCityOrigin+'/'+idCityDestiny+'/'+chairsSelecteds+'/'+tripKeyGo+'/'+dateGo+'/'+chairsSelectedsBack+'/'+tripKeyBack+'/'+dateBack;
						//var urlTo = '';
						$( "#confirmSelection" ).attr("disabled", true);
						$.ajax({
				          url: urlTo,
				          success: function (response) {
				            if(response=='Error')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response=='Reservas')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Has superado el numero de Reservas por viaje y dia. Por favor realiza el pago de las Reservas que tienes.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response!='Error' || response!='Reservas')
				            {
				            	window.location.href = '/pages/checkout/'+response;
				            	//console.log(response);
				            	//console.log('2G Ida 2G Regreso');
				            }
				          },
				          error: function (error) {
				            $( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    				$( "#messagePop" ).show();
				          }
				        });
		        	}
        		}
        		else if (chairsMapFirst.length!=0 && countRowsS.length!=1 && chairsMapFirstB.length!=0 && countRowsSB.length==1) 
        		{
        			//If Travesl is Go Double Bus and Back Normal
        			var chairsSelected = piso1.find('selected').length;
        			var chairsSelected2 = piso2.find('selected').length;
        			var chairsSelectedB = piso1b.find('selected').length;
        			if(chairsSelected==0 && chairsSelected2==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else if(chairsSelectedB==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla de Regreso.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else
		        	{
		        		//console.log('4');
		        		var tripKeyGo = $( "#tripKeyGo" ).val();
		        		var tripKeyBack = $( "#tripKeyBack" ).val();
	        			var idCityOrigin = $( "#idCityOrigin" ).val();
	        			var idCityDestiny = $( "#idCityDestiny" ).val();
	        			var dateGo = $( "#tripDateGo" ).val();
	        			var dateBack = $( "#tripDateBack" ).val();
	        			var chairsSelecteds = '';
	        			var chairsSelecteds2 = '';
	        			var end = piso1.find('selected').length;
	        			var end2 = piso2.find('selected').length;
	        			var i = 1;
	        			var j = 1;
	        			
	        			piso1.find('selected').each(function () 
				        {
				        	if(i===end && piso2.find('selected').length==0)
				        	{
				        		chairsSelecteds += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
			                i++;
			            });
			            piso2.find('selected').each(function () 
				        {
				        	if(j===end2 && piso1.find('selected').length==0)
				        	{
				        		chairsSelecteds2 += this.settings.id;
				        	}
				        	else if(j===end2 && piso1.find('selected').length!=0)
				        	{
				        		chairsSelecteds2 += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds2 += this.settings.id+',';
				        	}
			                j++;
			            });
			            var chairsSelectedsF = chairsSelecteds.concat(chairsSelecteds2);
			            var chairsSelectedsBack = '';
			            //var chairsSelecteds2Back = '';
			            var endBack = piso1b.find('selected').length;
			            //var end2Back = piso2.find('selected').length;
	        			var k = 1;
	        			//var l = 1;
				        piso1b.find('selected').each(function () 
				        {
				        	if(k===endBack)
				        	{
				        		chairsSelectedsBack += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelectedsBack += this.settings.id+',';
				        	}
			                k++;
			            });
			            var chairsSelectedsFB = chairsSelectedsBack;
			            //console.log(chairsSelectedsF);
			            //console.log(chairsSelectedsFB);
			            var urlTo = '/create_reservation_two_way/'+idCityOrigin+'/'+idCityDestiny+'/'+chairsSelectedsF+'/'+tripKeyGo+'/'+dateGo+'/'+chairsSelectedsFB+'/'+tripKeyBack+'/'+dateBack;
						//var urlTo = '';
						$( "#confirmSelection" ).attr("disabled", true);
						$.ajax({
				          url: urlTo,
				          success: function (response) {
				            if(response=='Error')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response=='Reservas')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Has superado el numero de Reservas por viaje y dia. Por favor realiza el pago de las Reservas que tienes.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response!='Error' || response!='Reservas')
				            {
				            	window.location.href = '/pages/checkout/'+response;
				            	//console.log(response);
				            	//console.log('DuoBus Ida 2G Regreso');
				            }
				          },
				          error: function (error) {
				            $( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    				$( "#messagePop" ).show();
				          }
				        });
		        	}
        		}
        		else if(chairsMapFirst.length!=0 && countRowsS.length==1 && chairsMapFirstB.length!=0 && countRowsSB.length!=1)
        		{
        			//console.log(chairsMapFirst.length);
        			//console.log(countRowsS.length);
        			//console.log(chairsMapFirstB.length);
        			//console.log(countRowsSB.length);
        			//If Travesl is Go Normal and Back Duoble Bus
        			var chairsSelected = piso1.find('selected').length;
        			var chairsSelectedB = piso1b.find('selected').length;
        			var chairsSelected2B = piso2b.find('selected').length;
        			if(chairsSelected==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else if(chairsSelectedB==0 && chairsSelected2B==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla de Regreso.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else
		        	{
		        		//console.log('5');
		        		var tripKeyGo = $( "#tripKeyGo" ).val();
		        		var tripKeyBack = $( "#tripKeyBack" ).val();
	        			var idCityOrigin = $( "#idCityOrigin" ).val();
	        			var idCityDestiny = $( "#idCityDestiny" ).val();
	        			var dateGo = $( "#tripDateGo" ).val();
	        			var dateBack = $( "#tripDateBack" ).val();
	        			var chairsSelecteds = '';
	        			var end = piso1.find('selected').length;
	        			var i = 1;
	        			piso1.find('selected').each(function () 
				        {
				        	if(i===end && piso1.find('selected').length!=0)
				        	{
				        		chairsSelecteds += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
			                i++;
			            });
			            var chairsSelectedsF = chairsSelecteds;
			            var chairsSelectedsBack = '';
			            var chairsSelecteds2Back = '';
			            var endBack = piso1b.find('selected').length;
			            var end2Back = piso2b.find('selected').length;
			            var j = 1;
	        			var k = 1;
				        piso1b.find('selected').each(function () 
				        {
				        	if(j===endBack && end2Back==0)
				        	{
				        		chairsSelectedsBack += this.settings.id;
				        	}
				        	else if(j===endBack && end2Back!=0)
				        	{
				        		chairsSelectedsBack += this.settings.id+',';
				        	}
				        	else
				        	{
				        		chairsSelectedsBack += this.settings.id+',';
				        	}
			                j++;
			            });
			            piso2b.find('selected').each(function () 
				        {
				        	if(k===end2Back)
				        	{
				        		chairsSelecteds2Back += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds2Back += this.settings.id+',';
				        	}
			                k++;
			            });
			            var chairsSelectedsFB = chairsSelectedsBack.concat(chairsSelecteds2Back);
			            //console.log(chairsSelectedsF);
			            //console.log(chairsSelectedsFB);
			            var urlTo = '/create_reservation_two_way/'+idCityOrigin+'/'+idCityDestiny+'/'+chairsSelectedsF+'/'+tripKeyGo+'/'+dateGo+'/'+chairsSelectedsFB+'/'+tripKeyBack+'/'+dateBack;
			            //var urlTo = '';
						$( "#confirmSelection" ).attr("disabled", true);
						$.ajax({
				          url: urlTo,
				          success: function (response) {
				            if(response=='Error')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response=='Reservas')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Has superado el numero de Reservas por viaje y dia. Por favor realiza el pago de las Reservas que tienes.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response!='Error' || response!='Reservas')
				            {
				            	window.location.href = '/pages/checkout/'+response;
				            	//console.log(response);
				            	//console.log('2G Ida DuoBus Regreso');
				            }
				          },
				          error: function (error) {
				            $( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    				$( "#messagePop" ).show();
				          }
				        });
		        	}
        		}
        		else
        		{
        			//If Travesl is Go Double Bus and Back Duoble Bus
        			var chairsSelected = piso1.find('selected').length;
        			var chairsSelected2 = piso2.find('selected').length;
        			var chairsSelectedB = piso1b.find('selected').length;
        			var chairsSelected2B = piso2b.find('selected').length;
		        	if(chairsSelected==0 && chairsSelected2==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else if(chairsSelectedB==0 && chairsSelected2B==0)
		        	{
		        		$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Debe seleccionar al menos una (1) silla de Regreso.</div>');
		    			$( "#messagePop" ).show();
		        	}
		        	else
		        	{
		        		//console.log('6');
		        		var tripKeyGo = $( "#tripKeyGo" ).val();
		        		var tripKeyBack = $( "#tripKeyBack" ).val();
	        			var idCityOrigin = $( "#idCityOrigin" ).val();
	        			var idCityDestiny = $( "#idCityDestiny" ).val();
	        			var dateGo = $( "#tripDateGo" ).val();
	        			var dateBack = $( "#tripDateBack" ).val();
	        			var chairsSelecteds = '';
	        			var chairsSelecteds2 = '';
	        			var end = piso1.find('selected').length;
	        			var end2 = piso2.find('selected').length;
	        			var i = 1;
	        			var j = 1;
				        piso1.find('selected').each(function () 
				        {
				        	if(i===end && end2==0)
				        	{
				        		chairsSelecteds += this.settings.id;
				        	}
				        	else if(i===end && end2!=0)
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
				        	else
				        	{
				        		chairsSelecteds += this.settings.id+',';
				        	}
			                i++;
			            });
			            piso2.find('selected').each(function () 
				        {
				        	if(j===end2)
				        	{
				        		chairsSelecteds2 += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds2 += this.settings.id+',';
				        	}
			                j++;
			            });
			            var chairsSelectedsF = chairsSelecteds.concat(chairsSelecteds2);
			            var chairsSelectedsBack = '';
			            var chairsSelecteds2Back = '';
			            var endBack = piso1b.find('selected').length;
			            var end2Back = piso2b.find('selected').length;
			            var k = 1;
	        			var l = 1;
				        piso1b.find('selected').each(function () 
				        {
				        	if(k===endBack && end2Back==0)
				        	{
				        		chairsSelectedsBack += this.settings.id;
				        	}
				        	else if(k===endBack && end2Back!=0)
				        	{
				        		chairsSelectedsBack += this.settings.id+',';
				        	}
				        	else
				        	{
				        		chairsSelectedsBack += this.settings.id+',';
				        	}
			                k++;
			            });
			            piso2b.find('selected').each(function () 
				        {
				        	if(l===end2Back)
				        	{
				        		chairsSelecteds2Back += this.settings.id;
				        	}
				        	else
				        	{
				        		chairsSelecteds2Back += this.settings.id+',';
				        	}
			                l++;
			            });
			            var chairsSelectedsFB = chairsSelectedsBack.concat(chairsSelecteds2Back);
			            //console.log(chairsSelectedsF);
			            //console.log(chairsSelectedsFB);
			            var urlTo = '/create_reservation_two_way/'+idCityOrigin+'/'+idCityDestiny+'/'+chairsSelectedsF+'/'+tripKeyGo+'/'+dateGo+'/'+chairsSelectedsFB+'/'+tripKeyBack+'/'+dateBack;
			            //var urlTo = '';
						$( "#confirmSelection" ).attr("disabled", true);
						$.ajax({
				          url: urlTo,
				          success: function (response) {
				            if(response=='Error')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response=='Reservas')
				            {
				            	$( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Has superado el numero de Reservas por viaje y dia. Por favor realiza el pago de las Reservas que tienes.</div>');
		    					$( "#messagePop" ).show();
				            }
				            else if(response!='Error' || response!='Reservas')
				            {
				            	window.location.href = '/pages/checkout/'+response;
				            	//console.log(response);
				            	//console.log('2G Ida DuoBus Regreso');
				            }
				          },
				          error: function (error) {
				            $( "#messagePop" ).html('<div class="alert alert-danger" role="alert">Error al reservar la Silla.</div>');
		    				$( "#messagePop" ).show();
				          }
				        });
		        	}
        		}
        	}
		});
		
    }
  };
})(jQuery, Drupal, drupalSettings);
