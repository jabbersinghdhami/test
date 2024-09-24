(function($) {
	'use strict';

	mkdf.modules.restaurant = {};

	$(document).ready(function() {
		mkdfRestaurantDatePicker();
		mkdfRestaurantMenuCarousel();
	});

	var mkdfRestaurantDatePicker = function() {
		var datepicker = $('.mkdf-ot-date');

		if(datepicker.length) {
			datepicker.each(function() {
				$(this).datepicker({
					prevText: '<span class="arrow_carrot-left"></span>',
					nextText: '<span class="arrow_carrot-right"></span>'
				});
			});
		}
	};

	var mkdfRestaurantMenuCarousel = function() {
		var menuCarousels = $('.mkdf-menu-carousel');
		var thisCarousel;

		if(menuCarousels.length) {
			menuCarousels.each(function() {
				thisCarousel = $(this);

				thisCarousel.owlCarousel({
					itemsCustom: [
						[0, 1],
						[600, 1],
						[768, 3],
						[1024, 3]
					],
					navigation: true,
					navigationText: [
						'<span class="mkdf-prev-icon"><i class="fa fa-angle-left"></i></span>',
						'<span class="mkdf-next-icon"><i class="fa fa-angle-right"></i></span>'
					],
					slideSpeed: 800,
					pagination: false
				});
			})
		}
	};

})(jQuery)