var modal_slider = null;
var $modal_window = null;

(function($) {
	var App;
	App = (function() {

		function app() {
			window.app = this;
			this.waypoint('.section-home', 'removeAllActive', null);
			this.waypoint('.section-team', 'toggleActiveState', '#nav-team');
			this.waypoint('.section-services', 'toggleActiveState', '#nav-services');
			this.waypoint('.section-join', 'toggleActiveState', '#nav-join');
			this.waypoint('.section-contact', 'toggleActiveState', '#nav-contact');
		}

		app.prototype.waypoint = function(el, callback, affected) {
			$(el).waypoint(function() {
				window.app[callback](affected);
			});
		}

		app.prototype.toggleActiveState = function(el) {
			this.removeAllActive();
			$(el).addClass('active');
		}

		app.prototype.removeAllActive = function() {
			$('.active').removeClass('active');
		}

		app.prototype.listen = function(el, trigger, callback) {
			if (document.addEventListener) {
				el.addEventListener(trigger, callback, false);
			} else {
				el.attachEvent(trigger, callback);
			}
		}

		app.prototype.unlisten = function(el, trigger, callback) {
			if (document.removeEventListener) {
				el.removeEventListener(trigger, callback, false);
			}
		}

		return app;

	})();

	app = new App();


})(jQuery);

jQuery(document).ready(function($) {
	// add fixed header menu functionality when on homepage
	$(window).resize(resize_refresh);
	resize_refresh();
	$('.no-click').click(no_click);
	var $open_modal = $('.open-modal');
	$open_modal.click(open_profile_modal);
	$modal_window = jQuery('#modal-window');
	$modal_window.on('shown.bs.modal', show_modal);

	// position_sphere_elements();

	function resize_refresh(e) {
		update_header_position(e);
		equal_height_cols($('.col'));
		position_sphere_elements();

		if( is_screen_md() ) {
			remove_collapsible_functionality();
		} else {
			add_collapsible_items();
		}
	}

	function update_header_position(e) {
		var top_buffer = 0;
		if( $('#wpadminbar').length ) {
			top_buffer = $('#wpadminbar').height();
		}
		$('#masthead').css('top', top_buffer + 'px');

		console.log($('#masthead').height());

		//$('#content').css('paddingTop', $('#masthead').height());
		$('#content').css('paddingTop', 84);
	}

	function no_click(e) {
		e.preventDefault();
	}

	function equal_height_cols(elements) {

		elements.css('height', 'auto');

		if( !is_screen_sm() ) {
			return;
		}

		var tallest = 0;

		elements.each(function() {

			var this_height = $(this).height();
			if( this_height > tallest ) {
				tallest = this_height;
			}
		});

		elements.height(tallest);
	}

	function open_profile_modal(e) {
		e.preventDefault();

		if( !is_screen_md() ) {
			return;
		}

		var staff_container = $(e.currentTarget).closest('.staff-container');

		var modal_title = $(e.currentTarget).text();
		var modal_content = staff_container.find('.description').text();

		var cloned = staff_container.find('.staff-list').clone();
		cloned.removeClass('collapse').removeAttr('style').find('li').addClass('slide');


		// cloned.responsiveSlides({
		// 	auto: false,
		// 	pagination: true,
		// 	nav: true,
		// 	fade: 500,
		// 	manualControls: $('#modal-window .modal-footer')
		// });


		var _modal_body = $('#modal-window').find('.modal-body');

		_modal_body.addClass('invisible');

		$('#modal-window').find('.modal-title').text(modal_title);
		_modal_body.text(modal_content);

		var _modal_slider = $('<div class="slider"></div>');
		_modal_slider.appendTo(_modal_body);
		_modal_slider.append('<div class="next-arrow slide-control slide-next"><i class="fa fa-arrow-circle-right"></i></div>');
		_modal_slider.append('<div class="prev-arrow slide-control slide-prev"><i class="fa fa-arrow-circle-left"></i></div>');

		cloned.appendTo(_modal_slider);
		$modal_window.modal('show');
	}

	function show_modal(e) {

		modal_slider = $modal_window.find('.slider').unslider({
			delay: false
		});

		$modal_window.find('.modal-body').removeClass('invisible');

		var slides = $modal_window.find('.slide');
		equal_height_cols(slides);

		modal_slider.find('.slide-control').click(modal_controls);
	}

	function modal_controls(e) {
		// e.preventDefault();

		if( $(this).hasClass('.slide-next') ) {
			modal_slider.data('unslider')['next']();
		} else {
			modal_slider.data('unslider')['prev']();
		}
	}

	function position_sphere_elements() {

		var $container = $('.half-sphere-container');
		var $sphere_list = $container.find('.sphere-el .staff-specialty');
		var $center = $('.center-sphere');

		var width = $container.outerWidth();
		var radius = 250; // radius of the circle
		var	height = $container.height();
		var	step = (Math.PI / ($sphere_list.length - 1) );
		var angle = Math.PI;

		$('.horizontal-line').remove(); // remove all lines and redraw them

		$sphere_list.each(function() {
			// console.log('angle: ' + angle);
			// console.log(Math.cos(angle));
			var x = Math.round(width/2 + radius * Math.cos(angle) - $(this).width()/2),
			y = Math.round(height + radius * Math.sin(angle) - ($(this).height() * 2) );

			// console.log( 'cos: ' + Math.cos(angle) );
			// console.log( 'new cos: ' + Math.cos(angle * $sphere_list.length) );

			// console.log($(this)[0]);
			$(this).css({
				left: x + 'px',
				top: y + 'px'
			});

			console.log('x: ' + x + ', y: ' + y);
			// console.log($center[0]);
			// connect a line
			if( is_screen_md() ) {
				connect($center, $(this), '#000', 4);
			}

			angle += step;
		});
	}

	function draw_lines() {

	}
	function add_collapsible_items() {
		$('.no-click').attr('data-toggle', 'collapse');
	}

	function remove_collapsible_functionality() {
		$('.no-click').attr('data-toggle', '');
	}
	function is_screen_sm() {
		return $('.screen-sm-min').is(':visible');
	}

	function is_screen_md() {
		return $('.screen-md-min').is(':visible');
	}
});

function get_offset( el ) { // return element top, left, width, height
    var _x = 0;
    var _y = 0;
    var _w = el.offsetWidth|0;
    var _h = el.offsetHeight|0;
    while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        // _x += el.offsetLeft - el.scrollLeft;
        _x += el.offsetLeft;
        // _y += el.offsetTop - el.scrollTop;
        _y += el.offsetTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x, width: _w, height: _h };
}

function connect(div1, div2, color, thickness) { // draw a line connecting elements
    var off1 = div1.position();
    var off2 = div2.position();

    console.log( off1 );
    // bottom center
    var x1 = off1.left + div1.width() / 2;
    var y1 = off1.top + div1.height() / 2;
    // center
    var x2 = off2.left + div2.width() / 2;
    var y2 = off2.top + div1.height() / 2;
    // distance
    var length = Math.sqrt(((x2-x1) * (x2-x1)) + ((y2-y1) * (y2-y1)));
    // center
    var cx = ((x1 + x2) / 2) - (length / 2);
    var cy = ((y1 + y2) / 2) - (thickness / 2);
    // angle
    var angle = Math.atan2((y1-y2),(x1-x2))*(180/Math.PI);
    // make hr

    var style = 'height:' + thickness + 'px;';
    style += ' background-color:' + color + ';';
    style += ' left:' + cx + 'px;';
    style += ' top:' + cy + 'px;';
    style += ' width:' + length + 'px;';
    style += ' -moz-transform:rotate(' + angle + 'deg); -webkit-transform:rotate(' + angle + 'deg); -o-transform:rotate(' + angle + 'deg); -ms-transform:rotate(' + angle + 'deg); transform:rotate(' + angle + 'deg);';

    var htmlLine = "<div class='horizontal-line' style='" + style + "' />";
    //
    // alert(htmlLine);

    jQuery('#specialist-container').prepend(htmlLine);
}
