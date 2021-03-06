(function($){

  var masthead_height = $('#masthead').height();
  $(window).scroll(function () {
      var top = $(document).scrollTop();
      $('.splash').css({
        'background-position': '0px -'+(top/3).toFixed(2)+'px'
      });
      if(top > masthead_height)
        $('#home > .navbar').removeClass('navbar-transparent');
      else
        $('#home > .navbar').addClass('navbar-transparent');
  });

  $("a[href='#']").click(function(e) {
    e.preventDefault();
  });

  
  var _header_smaler = 1;
  var _header_bigger = 1;
  // sidabar left pharalax effect
  var left_sidebar_difference = $(document).height() - $('#sidebar').height();
  var chujstwo_matematyczne = left_sidebar_difference / ($(document).height());
  //var chujstwo_matematyczne = left_sidebar_difference/($('#sidebar').height()+$(document).height());

  window.addEventListener("scroll",function(h){
      
      var scaleAdd = 1 - (window.pageYOffset/150);

      if(window.pageYOffset>masthead_height){
        header_smaller();
        // sidabar left pharalax effect
        $('#sidebar').css({'margin-top': (window.pageYOffset *  chujstwo_matematyczne)-masthead_height});
      }else{
          header_bigger(); 
          // sidabar left pharalax effect
          $('#sidebar').css({'margin-top': 0}); 
      }

      function header_smaller(){
          if(_header_smaler == 0){            
            return false;
          }

          $('#menu-new-menu').css('display','none');
          $('#content').css('padding-top',masthead_height+'px');
          $('#masthead').css({'position':'fixed','width':'100%','left':0,'height':'0px','overflow':'hidden','opacity':'0.95'}); 
          $('.site-description').css({'-webkit-transform': 'scale(0.4)',});
          $('.site-branding').css({'margin-top': '10px','margin-bottom': '8px','opacity':'0'});
          
          $("#masthead").animate({
            height: masthead_height-20
            }, 250);
          $('.site-branding').fadeTo('slow',1);

          _header_smaler = 0;
          _header_bigger = 1;
         
          //$('.site-description').css('display','none'); 
          //$('.site-title').css('margin-top','-20px'); 
         
       }
       function header_bigger(){
          if(_header_bigger == 0){
            //return false;
          }
          $('#menu-new-menu').css('display','block');
          $('.site-description').css({'-webkit-transform': 'scale('+scaleAdd+')',});
          $('#masthead').css({'position':'relative','height':'auto'});
          $('#content').css('padding-top','0px');
          $('.site-branding').css({'margin-top': '21px','margin-bottom': '17px'});
          // $('.site-description').css('display','block'); 
         // $('.site-title').css('margin-top','30px'); 
         
          _header_smaler = 1;
          _header_bigger = 0;
       }
  });

  /* init left sidebar storage stage */
  if(sessionStorage.left_sidebar_stage == null){
    sessionStorage.left_sidebar_stage = 0;
  };

  /* set hide left sidebar on Pages and Posts */
  if($('body').hasClass('single')){
    sessionStorage.left_sidebar_stage = 0;
  }
  if($('body').hasClass('page')){
    sessionStorage.left_sidebar_stage = 0;
  }

  /* Auto Show or Hidden sidebar */
  if(sessionStorage.left_sidebar_stage == 0){
    
    $('#sidebar-left').addClass('sidebar-close');
    $('#primary').addClass('width-100');
    $('#primary').removeClass('right-minus30');
  
  }else{

    $('#sidebar-left').removeClass('sidebar-close');
    $('#primary').removeClass('width-100');
    $('#primary').addClass('right-minus30');

  }
  /* Show or Hidden sidebar by click */
  $('#left-sidebar-menu-button').click(function(){
   activate_left_sidebar();
  });

  /*$("#sidebar-left").on("swipeleft",function(){
    activate_left_sidebar();
  });*/

  function activate_left_sidebar(){

    $('#sidebar-left').toggleClass('sidebar-close');
    $('#primary').toggleClass('width-100');
    $('#primary').toggleClass('right-minus30');

    if(sessionStorage.left_sidebar_stage == 0){
      sessionStorage.left_sidebar_stage = 1;
      /*      $('html, body').animate({
      scrollTop: $("html").offset().top
      }, 150);*/
    }else{
      sessionStorage.left_sidebar_stage = 0;
    }
  }


 function detectswipe(el,func) {
  swipe_det = new Object();
  swipe_det.sX = 0;
  swipe_det.sY = 0;
  swipe_det.eX = 0;
  swipe_det.eY = 0;
  var min_x = 20;  //min x swipe for horizontal swipe
  var max_x = 40;  //max x difference for vertical swipe
  var min_y = 40;  //min y swipe for vertical swipe
  var max_y = 50;  //max y difference for horizontal swipe
  var direc = "";
  ele = document.getElementById(el);
  ele.addEventListener('touchstart',function(e){
    var t = e.touches[0];
    swipe_det.sX = t.screenX; 
    swipe_det.sY = t.screenY;
  },false);
  ele.addEventListener('touchmove',function(e){
    //lock slide with touch
    //e.preventDefault();
    var t = e.touches[0];
    swipe_det.eX = t.screenX; 
    swipe_det.eY = t.screenY;    
  },false);
  ele.addEventListener('touchend',function(e){
    //horizontal detection
    if ((((swipe_det.eX - min_x > swipe_det.sX) || (swipe_det.eX + min_x < swipe_det.sX)) && ((swipe_det.eY < swipe_det.sY + max_y) && (swipe_det.sY > swipe_det.eY - max_y)))) {
      if(swipe_det.eX > swipe_det.sX) direc = "r";
      else direc = "l";
    }
    //vertical detection
    if ((((swipe_det.eY - min_y > swipe_det.sY) || (swipe_det.eY + min_y < swipe_det.sY)) && ((swipe_det.eX < swipe_det.sX + max_x) && (swipe_det.sX > swipe_det.eX - max_x)))) {
      if(swipe_det.eY > swipe_det.sY) direc = "d";
      else direc = "u";
    }

    if (direc != "") {
      if(typeof func == 'function') func(el,direc);
    }
    direc = "";
  },false);
}

function sidebar_swipe_left(el,d){
  if(d == 'l'){
    activate_left_sidebar();
  }
}
detectswipe('sidebar-left',sidebar_swipe_left);

  /* FIXED SOME COMPONENTS TO MATERIAL DESIGN THEME */
  
  $('.search-field').addClass('form-control');
  $('.search-submit').addClass('btn');
  $('#wp-calendar').addClass('table table-responsive table-striped');
})(jQuery);
/* sticky header */

