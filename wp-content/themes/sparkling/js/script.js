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
	$(window).resize(update_header_position);
	update_header_position();

	function update_header_position(e) {
		var top_buffer = 0;
		if( $('#wpadminbar').length ) {
			top_buffer = $('#wpadminbar').height();
		}
		$('#masthead').css('top', top_buffer + 'px');
		console.log(top_buffer);

		$('#content').css('paddingTop', $('#masthead').height());
	}
});