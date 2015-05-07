var modal_slider = null;

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
	$('.no-click').click(open_profile_modal);

	function resize_refresh(e) {
		update_header_position(e);
		equal_height_cols($('.col'));

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
		console.log(top_buffer);

		$('#content').css('paddingTop', $('#masthead').height());
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

		var staff_container = $(e.currentTarget).closest('.staff-container');

		var modal_title = $(e.currentTarget).text();
		var modal_content = staff_container.find('.description').text();

		var cloned = staff_container.find('.staff-list').clone();
		cloned.removeClass('collapse').addClass('slider').find('li').addClass('slide');
		cloned.responsiveSlides({
			auto: false,
			pagination: true,
			nav: true,
			fade: 500,
			manualControls: $('#modal-window .modal-footer')
		});
		
		var _modal_body = $('#modal-window').find('.modal-body');

		$('#modal-window').find('.modal-title').text(modal_title);
		_modal_body.text(modal_content);
		cloned.appendTo(_modal_body);
		$('#modal-window').modal('show');
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