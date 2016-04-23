$(function(){ 
    
    // "constants"
    var NAV_OFFSET = 35;
    var SCROLLBAR = 20;
    var AJAX_IMG_AMOUNT = 8;
    var MAX_CALLS = 5;
    
    // other variables
    var amount = $(window).scrollTop();
    var navHeight = $("#nav").height();
    var bodyHeight = $("body").height();
    var wHeight = $(window).height();
    var lineWidth = window.innerWidth - $(".color-line-pics div").width();
    var scrollAmount = amount/(bodyHeight-wHeight);
    var lineScroll = scrollAmount*lineWidth-SCROLLBAR;
    var resizeTimer;
    var calls = 0;
    var errorCalls = 0;
    
    $(".color-line-pics div").css("width", wHeight/bodyHeight*100 + "%");
    
    // if a page is scrolled when loaded
    navbarEvents(amount, navHeight, lineScroll);
    
    
    
    // scroll events
    $(window).scroll(function(){
        wHeight = $(window).height();
        navHeight = $("#nav").height();
        bodyHeight = $("body").height();
        amount = $(window).scrollTop();
        $(".color-line-pics div").css("width", wHeight/bodyHeight*100 + "%");
        scrollAmount = amount/(bodyHeight-wHeight);
        lineScroll = scrollAmount*lineWidth-SCROLLBAR;
        navbarEvents(amount, navHeight, lineScroll);

    });
    
    $(window).resize(function(){
        clearTimeout(resizeTimer);
        // recalculate stuff after resizing
        resizeTimer = setTimeout(function(){
            wHeight = $(window).height();
            navHeight = $("#nav").height();
            bodyHeight = $("body").height();
            lineWidth = window.innerWidth - $(".color-line-pics div").width();
            $(".color-line-pics div").css("width", wHeight/bodyHeight*100 + "%");
            navbarEvents(amount, navHeight, lineScroll);
        }, 250);
        
    });
    
    // hide current form
    $(".close-form").click(function(){
        $(this).parent().parent().parent().fadeOut();
        console.log("button clicked");
    });
     
    function navbarEvents(amount, navHeight, lineScroll) {
        if (window.innerWidth >= 768) {
            // navbar events
            if (amount >= NAV_OFFSET) {
                $("#nav").addClass("navbar-fixed-top nav-offset");
                $(".hero-pics").css("margin-top", 0);
            }
            else {
                $("#nav").removeClass("navbar-fixed-top nav-offset");  
                $(".hero-pics").css("margin-top", -navHeight);
            }
            
        }
        else {
            $("#nav").addClass("navbar-fixed-top nav-offset");
            $(".hero-pics").css("margin-top", 0);
        }
        
        var transformAmount = "translateX(" + lineScroll + "px)";
        $(".color-line-pics div").css({
            "-webkit-transform": transformAmount,
            "-moz-transform":  transformAmount,
            "transform":  transformAmount
        });
    }
    

    
});