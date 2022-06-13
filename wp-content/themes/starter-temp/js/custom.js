jQuery(document).ready(function($) {

  

  var isMobile = false; //initiate as false

  if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
  }

  /* ----------
  --- Smooth Scroll
  ----------  */

  $(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
  });

  $('.backto').on('click',function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $('body').offset().top
    }, 500);
  });

  

  



  /* ----------
  --- tabs
  ----------  */

  if($('.tabs').length){
    $('.tabs li').each(function(){
      $(this).click(function(){
        var type = $(this).data('name');
        $('.tabs li').removeClass('active');
        $('.tab-content').removeClass('active');
        $(this).addClass('active');
        $('.'+type).addClass('active');



      })
    })
  }

  if($('.buttons').length){
    $('.btn').each(function(){
      $(this).click(function(){
        var type = $(this).data('type');
        console.log(type);

        $('.btn').removeClass('active');
        $(this).addClass('active');

        if(type == 'transport'){
          $('.map:not(.map--base)').fadeOut();
          $('.map--base').show();
          $('.map--base').css({"opacity" : "0"});
          $('.map--transport').show();
        }else{
           $('.map:not(.map--base)').fadeOut();
          $('.map--base').show();
          $('.map--base').css({"opacity" : "1"});
          $('.map--'+type).show();
        }
      })
    })
  }

  /* ----------
  --- CAROUSELS
  ----------  */

  $('.multiple_carousel').slick({
    infinite: true,
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    }]
  });
  
  $('.full_carousel').slick({
    infinite: false,
    dots: true,
    arrows:true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: false,
      }
    }]
  });

  

  /* ----------
  --- WAYPOINTS
  ----------  */
  $(window).on("scroll", function () {
      
  

   $('.footer').waypoint({
    handler: function(direction) {
        $('.backto').toggleClass('bottom');
    },
      offset: '100%'
    });

   });

   /* ----------
  --- LIGHTBOX
  ----------  */

  $('.plus-overlay').each(function(){
    $(this).click(function(){
      var img = $(this).data('src');

      $('.modal').slideToggle();
      $('.modal-inner').html('<img src="'+img+'"><div class="close"></div>');
      $('.close').click(function(){
         $('.modal').fadeOut();
      })
    })
  })

  if($('.close').length){
    $('.close').each(function(){
      $(this).click(function(){
           $('.modal').fadeOut();
        })
    })
  }

  

  /* ----------
  --- DRAGGABLE MAP
  ----------  */
if($('.map-inner').length){
  Draggable.create(".map-inner", {
     type:"x",
     bounds:"#map",
     edgeResistance:0.5
  });
}


  /* ----------
  --- HEADER MENU
  ----------  */
    var $nav = $('.header-menu');
    var $win = $(window);
    var winH = 100;

    if(!$('.nav-override').length){
      winH = $win.height();
      
    }
    if(!$('.burger-menu--opened').length){
              $('.burger-menu').on('click', function() {
                $('.header-menu').addClass('active');
                $(this).addClass("burger-menu--opened");
    });
      $win.on("scroll", function () {
        console.log($(this).scrollTop() );
        console.log(winH);

          if ($(this).scrollTop() >= winH && $win.width() > 768) {
            
              $('.burger-menu').addClass("burger-menu--opened");
              $('.burger-menu').removeClass("burger-menu--closed");
              $('.header-menu').addClass('active');
              $('.backto').addClass('active');
              
            
          } else {
           
              $('.burger-menu').removeClass("burger-menu--opened");
              $('.burger-menu').addClass("burger-menu--closed");
              $('.header-menu').removeClass('active');
              $('.backto').removeClass('active');
              

            
          }
          if ($(this).scrollTop() >= winH && $win.width() < 768) {
              $('.burger-menu').addClass('dark');
              $('.backto').addClass('active');
          }else{
              $('.burger-menu').removeClass('dark');
              $('.backto').removeClass('active');
          }
      }).on("resize", function(){ // If the user resizes the window
          if(!$('.nav-override').length){
            winH = $(this).height(); // you'll need the new height value
          }
      });
    }else{
              $('.burger-menu').on('click', function() {
                $('.header-menu').removeClass('active');
                $(this).removeClass("burger-menu--opened");
                $(this).addClass("burger-menu--closed");
              });
    }



  /* ----------
  --- FUNCTIONS
  ----------  */


  function requestFullScreen() {

  var el = document.body;

  // Supports most browsers and their versions.
  var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen 
  || el.mozRequestFullScreen || el.msRequestFullScreen;

  if (requestMethod) {

    // Native full screen.
    requestMethod.call(el);

  } else if (typeof window.ActiveXObject !== "undefined") {

    // Older IE.
    var wscript = new ActiveXObject("WScript.Shell");

    if (wscript !== null) {
      wscript.SendKeys("{F11}");
    }
  }
}

  $.fn.isInViewport = function(){

        var win = $(window);

        var viewport = {
            top : win.scrollTop(),
            left : win.scrollLeft()
        };
        viewport.right = viewport.left + win.width();
        viewport.bottom = viewport.top + win.height();

        var bounds = this.offset();
        bounds.right = bounds.left + this.outerWidth();
        bounds.bottom = bounds.top + this.outerHeight();

        return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

    };

  AOS.init();

  



});
