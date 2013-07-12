jQuery(function($) {

  $('#featured').orbit();

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
      play  : true
    }       
  });

  $(".banner-text").hide();

  $(".mini-banner").hover(function(){
     $(this).find(".banner-text").show();
  },function(){
     $(this).find(".banner-text").hide();
  });

  $('.accordion-inner').hide();
  $('.accordion h3:first').addClass("active");
  $('.accordion .accordion-inner:first').show();

  $(".accordion h3").click(function(){
    $(this).toggleClass("active");
    $(this).next(".accordion .accordion-inner").slideToggle("fast");
      return true;
  });

});