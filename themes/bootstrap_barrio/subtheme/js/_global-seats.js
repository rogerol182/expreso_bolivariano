/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.bootstrap_barrio_subtheme = {
    attach: function (context, settings) {
    	/* Seats */
    	//alert('seats');
    	var piso1 = $('#seat-map').seatCharts({
	        map: [
	            'p[conductor,conductor]:____',
	            'pp_pp',
	            'pp_pp',
	            'cc_cc',
	            'cc__p[escalera1,escalera1]',
	            'cc_cc',
	            'ee_ee',
	            'ee_ee',
	            'ee_ee',
	            'ff_ff',
	            'ff_ff',
	            'ff__p[escalera2,escalera2]',
	            'ff_ff',
	            'ff__p[bano,bano]',
	        ],
	        seats: {
	            f: {
	                price   : 50000,
	                classes : 'increible-class', //your custom CSS class
	                category: 'Tarifa Increíble'
	            },
	            e: {
	                price   : 65000,
	                classes : 'comoda-class', //your custom CSS class
	                category: 'Tarifa Comoda'
	            },
	            c: {
	                price   : 90000,
	                classes : 'chevere-class', //your custom CSS class
	                category: 'Tarifa Chevere'
	            },
	            p: {
	                price   : 120000,
	                classes : 'first-class', //your custom CSS class
	                category: 'Tarifa Primera Clase'
	            } 
	        },
	        naming : {
	            top : false,
	            left: false,
	            columns:['A', 'B', '', 'C','D'] ,
	            rows: ['','01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14'],
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
	                [ 'f', 'available',   'Tarifa Increíble' ],
	                [ 'e', 'available',   'Tarifa Comoda'],
	                [ 'c', 'available',   'Tarifa Chevere' ],
	                [ 'p', 'available',   'Tarifa Primera Clase'],
	                [ 'f', 'unavailable', 'No disponible'],
	                [ 'f', 'selected', 'Seleccionada']
	            ]                   
	        },
	        click: function () {
	            if (this.status() == 'available') {
	                //let's create a new <li> which we'll add to the cart items
	                $('<li>'+this.data().category+' Silla # '+this.settings.label+': <b>$'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
	                    .attr('id', 'cart-item-'+this.settings.id)
	                    .data('seatId', this.settings.id)
	                    .appendTo($cart);
	                
	                /*
	                 * Lets update the counter and total
	                 *
	                 * .find function will not find the current seat, because it will change its stauts only after return
	                 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
	                 */
	                $counter.text(piso1.find('selected').length+1);
	                $totalp1 = recalculateTotal(piso1)+this.data().price;
	                $total_p1.text($totalp1);
	                $total.text($totalp2+$totalp1);
	                
	                return 'selected';
	            } else if (this.status() == 'selected') {
	                //update the counter
	                $counter.text(piso1.find('selected').length-1);
	                //and total

	                $totalp1 = recalculateTotal(piso1)-this.data().price;

	                $total_p1.text($totalp1);
	                $total.text($totalp2+$totalp1);
	            
	                //remove the item from our cart
	                $('#cart-item-'+this.settings.id).remove();
	            
	                //seat has been vacated
	                return 'available';
	            } else if (this.status() == 'unavailable') {
	                //seat has been already booked
	                return 'unavailable';
	            } else {
	                return this.style();
	            }
	        }
	    });
    }
  };
})(jQuery, Drupal);
