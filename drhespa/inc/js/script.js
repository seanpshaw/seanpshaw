jQuery(function($) {

  $('#featured').orbit();

  // $("#mini-banners").simplecarousel({
  //     next: $('.next'),
  //     prev: $('.prev'),
  //     slidespeed: 700,
  //     auto: 5000,
  //     width: 235,
  //     height: 117,
  //     visible: 4,
  //     items: 8, 
  //     noloop: false, 
  //     jump: 1
  // });

  $("#mini-banners").carouFredSel({
    items           : 4,
    height          : 117,
    scroll : {
      items         : 1,
      easing        : "swing",
      duration      : 1000,             
      pauseOnHover  : true
    } ,
    prev  : { 
      button  : ".prev",
      key   : "left"
    },
    next  : { 
      button  : ".next",
      key   : "right"
    },  
    auto  : { 
      play  : false
    }       
  });

  $(".banner-text").hide();

  $(".mini-banner").hover(function(){
     $(this).find(".banner-text").show();
  },function(){
     $(this).find(".banner-text").hide();
  });

});