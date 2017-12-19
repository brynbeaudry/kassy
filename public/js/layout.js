$(window).on("load resize",function(e){
     var elem = $("#main-nav")
     var main_contain = $(".main-contain")
     if($(window).width()<= 767 ){
        if(elem.hasClass('navbar-fixed-left')) {
            elem.removeClass('navbar-fixed-left').addClass('navbar-static-top')
            main_contain.css('top', "0px")
        }
     }else{
       if(elem.hasClass('navbar-static-top'))
         elem.removeClass('navbar-static-top').addClass('navbar-fixed-left')
         main_contain.css('padding-top', elem.attr("height") + "px")

    }
});
