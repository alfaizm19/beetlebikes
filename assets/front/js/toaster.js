;(function(window, $){

  var defaultConfig = {
    type: '',
    autoDismiss: true,
    container: '#toasts',
    autoDismissDelay: 4000,
    transitionDuration: 500
  };

  $.toast = function(config){
    var size = arguments.length;
    var isString = typeof(config) === 'string';
    
    if(isString && size === 1){
      config = {
        message: config
      };
    }

    if(isString && size === 2){
      config = {
        message: arguments[1],
        type: arguments[0]
      };
    }
    
    return new toast(config);
  };

  var toast = function(config){
    config = $.extend({}, defaultConfig, config);
    // show "x" or not
    var close = config.autoDismiss ? '&times;' : '&times;';
    
    // toast template
    var toast = $([
      '<div class="toast ' + config.type + '">',
      '<p>' + config.message + '</p>',
      '<div class="close">' + close + '</div>',
      '</div>'
    ].join(''));
    
    // handle dismiss
    toast.find('.close').on('click', function(){
      var toast = $(this).parent();

      toast.addClass('hide');

      setTimeout(function(){
        toast.remove();
      }, config.transitionDuration);
    });
    
    // append toast to toasts container
    $(config.container).append(toast);
    
    // transition in
    setTimeout(function(){
      toast.addClass('show');
    }, config.transitionDuration);

    // if auto-dismiss, start counting
    if(config.autoDismiss){
      setTimeout(function(){
        toast.find('.close').click();
      }, config.autoDismissDelay);
    }

    return this;
  };

})(window, jQuery);

/* ---- start demo code ---- */

var count = 1;
var types = ['success', 'info', 'error', 'warning', 'danger'];

function showMessage(type, msg) {
  var show = $('#toasts');
    if (type == 'success') {
        $.toast((msg));
         show.css('background-color', '#26d68a');
    } else if(type == 'info') {
        $.toast((msg));
        show.css('background-color', '#2cbcff');
    } else if(type == 'error') {
        $.toast((msg));
        show.css('background-color', '#f44336');
    } else if(type == 'warning') {
        $.toast((msg));
        show.css('background-color', '#ffa533');
    } else if(type == 'danger') {
        $.toast((msg));
        show.css('background-color', '#ff0000');
    } else {
        $.toast((msg));
         show.css('background-color', '#26d68a');
    }
};
showMessage('info', 'text');
/* ---- end demo code ---- */
