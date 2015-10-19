(function($){
  $(window).scroll(function () {
      var top = $(document).scrollTop();
      $('.splash').css({
        'background-position': '0px -'+(top/3).toFixed(2)+'px'
      });
      if(top > 50)
        $('#home > .navbar').removeClass('navbar-transparent');
      else
        $('#home > .navbar').addClass('navbar-transparent');
  });

  $("a[href='#']").click(function(e) {
    e.preventDefault();
  });

  
  var _header_smaler = 1;
  var _header_bigger = 1;
  window.addEventListener("scroll",function(h){
      
      var scaleAdd = 1 - (window.pageYOffset/150);

       if(window.pageYOffset>60){
          
          header_smaller();
          
          // sidabar left pharalax effect
          //$('#sidebar').css({'position':'relative','top': ( window.pageYOffset * 0.8 ) - (60 * 0.8)}); 

       }else{
          
          header_bigger(); 

          // sidabar left pharalax effect
          //$('#sidebar').css({'position':'relative','top': 0}); 
         
       }

       function header_smaller(){
          if(_header_smaler == 0){            
            return false;
          }
            $('#menu-new-menu').css('display','none');
            $('#content').css('padding-top','120px');
            $('#masthead').css({'position':'fixed','width':'100%','height':'60px','box-shadow':'0 11px 5px rgba(0,0,0,0.26)'}); 
            $('.site-description').css({'-webkit-transform': 'scale(0.4)',});
            $('.site-branding').css({'margin-top': '10px','opacity':'0'});
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
          $('#masthead').css({'position':'relative','height':'auto','box-shadow':'0 2px 5px rgba(0,0,0,0.26)'});
          $('#content').css('padding-top','0px');
          $('.site-branding').css({'margin-top': '21px'});
          // $('.site-description').css('display','block'); 
         // $('.site-title').css('margin-top','30px'); 
         
          _header_smaler = 1;
          _header_bigger = 0;
       }
  });

  $('#wp-calendar').addClass('table table-responsive table-striped');

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
  
  }else{

    $('#sidebar-left').removeClass('sidebar-close');
    $('#primary').removeClass('width-100');

  }
  /* Show or Hidden sidebar by click */
  $('#left-sidebar-menu-button').click(function(e){
    
    $('#sidebar-left').toggleClass('sidebar-close');
    $('#primary').toggleClass('width-100');

    if(sessionStorage.left_sidebar_stage == 0){
      sessionStorage.left_sidebar_stage = 1;
      $('html, body').animate({
          scrollTop: $("html").offset().top
      }, 150);
    }else{
       sessionStorage.left_sidebar_stage = 0;
    }

  })

})(jQuery);
/* sticky header */

