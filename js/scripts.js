jQuery(document).ready(function($) {
	
  	
  	enquire.register("screen and (min-width:768px)", {
	    match : function() {
	    	$('#menu .menu li ul').hide().removeClass('fallback');
            $('#menu .menu li').hover(
                function () {
                	$('ul', this).stop().slideDown(100);
                },
                function () {
                	$('ul', this).stop().slideUp(100);
                }
            );
	    },
	    unmatch : function() {
	    	
	    }
    });     
 	
}); // ends doc ready function