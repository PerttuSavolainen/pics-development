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
    
    // load first set of images when loaded
    loadImages(AJAX_IMG_AMOUNT);
    
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
        
        var imgWrapperBottom = $("#ajaxImageWrapper").offset().top + $("#ajaxImageWrapper").height();
        
        // set ajax call
        if ((amount+wHeight) >= imgWrapperBottom) {
            if (calls < 2) {
                loadImages(AJAX_IMG_AMOUNT);
                calls++;
            }
        }
        
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
    
    // load images and reset calls variable
    $("#loadMoreImages").click(function(){
        loadImages(AJAX_IMG_AMOUNT);
        calls = 0;                      
    });
    
    // hide current form
    $(".close-form").click(function(){
        $(this).parent().parent().parent().fadeOut();
        console.log("button clicked");
    });
    
    // show login form
    $("#login-btn").click(function(){
        $("#form-login").fadeIn();
    });
    
    // show register form
    $("#register-btn").click(function(){
        $("#form-register").fadeIn();
    });
     
    function navbarEvents(amount, navHeight, lineScroll) {
        // navbar events
        if (amount >= NAV_OFFSET) {
            $("#nav").addClass("navbar-fixed-top nav-offset");
            $("#hero").css("margin-top", 0);
        }
        else {
            $("#nav").removeClass("navbar-fixed-top nav-offset");  
            $("#hero").css("margin-top", -navHeight);
        }
        
        var transformAmount = "translateX(" + lineScroll + "px)";
        $(".color-line-pics div").css({
            "-webkit-transform": transformAmount,
            "-moz-transform":  transformAmount,
            "transform":  transformAmount
        });        
    }
    
    // makes ajax call for images 
    function loadImages(imgAmount, callTime) {
        
        $.ajax({
            url: "loadImages.php",
            type: "POST",
            data: {
                amount: imgAmount,
                callTime: callTime
            },
            success: function(response) {
                console.log("ajax call success");
                $("#ajaxImageWrapper").append(response);
            },
            error: function(error) {
                console.log(error);
                // check if amount of tries is valid
                if (calls < MAX_CALLS) {
                    setTimeout(function(){
                        loadImages(imgAmount);
                    }, 2000); 
                }
                errorCalls++;
                
            }
        });
    
    }
    
});