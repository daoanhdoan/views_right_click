(function ($) {
  'use strict';

  Drupal.behaviors.views_right_click = {
    attach: function (context, settings) {
      // Enable html5 context menus polyfill.
      $('.views-right-click-menu menu').once().each(function() {
        $.contextMenu('html5', {
          animation: {duration: 0, show: 'fadeIn', hide: 'fadeOut'}
        });
      });
      $('.views-right-click-copy-link').once().on('click', function() {
        var text  = $.selection();
        var $temp = $("<input>").appendTo($("body")).val(text).select();
        document.execCommand("copy");
        $temp.remove();
      });
    }
  };

})(jQuery);
