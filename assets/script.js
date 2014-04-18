(function() {
  var App;
  App = (function() {

    function app() {

    }

    app.prototype.waypoint = function() {
      
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
})();
