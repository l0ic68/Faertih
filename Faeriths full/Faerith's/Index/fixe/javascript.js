/* VARIABLE D'INITIALISATION */

var Nav_Mobile_Bool = 0;

window.onresize = resize;

function resize()
{
  if(screen.width > 1280)
  {
    Nav_Mobile_Bool = 0;
    $('#Navigation_mobile').css({
      "display" : "none"
    });
  }
}

(function($){

  /*$('#icon-search-main').click(function(a) {
    $('.search').css({
      "display" : "flex"
    });
  }*/

  /* NAVIGATION MOBILE */
    $('.icon-menu').click(function(e){
      if (Nav_Mobile_Bool == 0)
      {
        $('.icon-menu').css({

         //for firefox
         "-moz-animation-name":"rotateOn",
         "-moz-animation-duration":"1s",
         "-moz-animation-iteration-count":"1",
             "-moz-animation-fill-mode":"forwards",

         //for safari & chrome
         "-webkit-animation-name":"rotateOn",
         "-webkit-animation-duration":"1s",
         "-webkit-animation-iteration-count":"1",
         "-webkit-animation-fill-mode" : "forwards",

       });

        $('body').css({
          "overflow-y": "hidden"
        });
        $('#Navigation_mobile').css({
          "display" : "flex"
        });
        $('#Navigation_mobile').css({
          "transform" : "translateX(0%)"
        });
        Nav_Mobile_Bool = 1;
      }
      else
      {
        $('.icon-menu').css({

         //for firefox
         "-moz-animation-name":"rotateOff",
         "-moz-animation-duration":"1s",
         "-moz-animation-iteration-count":"1",
             "-moz-animation-fill-mode":"forwards",

         //for safari & chrome
         "-webkit-animation-name":"rotateOff",
         "-webkit-animation-duration":"1s",
         "-webkit-animation-iteration-count":"1",
         "-webkit-animation-fill-mode" : "forwards",

       });
        $('body').css({
          "overflow-y": "scroll"
        });
        $('#Navigation_mobile').css({
          "transform" : "translateX(-100%)"
        });
        $('#Navigation_mobile').css({
          "-moz-animation-name":"Disp",
          "-moz-animation-duration":"1s",
          "-moz-animation-iteration-count":"1",
              "-moz-animation-fill-mode":"forwards",
        });
        Nav_Mobile_Bool = 0;
      }
    });
})(jQuery);
