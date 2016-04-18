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

    // load first set of images when loaded
    loadImages(AJAX_IMG_AMOUNT);
    
    $(window).scroll(function(){
        
        amount = $(window).scrollTop();
        
        var imgWrapperBottom = $("#ajaxImageWrapper").offset().top + $("#ajaxImageWrapper").height();

        // set ajax call
        if ((amount+wHeight) >= imgWrapperBottom) {
            if (calls < 2) {
                loadImages(AJAX_IMG_AMOUNT);
                calls++;
            }
        }
    });
    
    // load images and reset calls variable
    $("#loadMoreImages").click(function(){
        loadImages(AJAX_IMG_AMOUNT);
        calls = 0;                      
    });
    
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
