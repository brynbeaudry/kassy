$(window).on("load resize",function(e){
      var elem = $("#main-nav")
     if($(window).width()<= 767 ){
        if(elem.hasClass('navbar-fixed-left'))
          elem.removeClass('navbar-fixed-left').addClass('navbar-static-top')
     }else{
       if(elem.hasClass('navbar-static-top'))
         elem.removeClass('navbar-static-top').addClass('navbar-fixed-left')
    }
});
