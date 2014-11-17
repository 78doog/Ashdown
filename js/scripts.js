jQuery(document).ready(function($) {
	$('#menu .menu li ul').hide().removeClass('fallback');
	$('#menu .menu li').hover(
		function () {
			$('ul', this).stop().slideDown(100);
  		},
  		function () {
  			$('ul', this).stop().slideUp(100);
  		}
  	);
}); // ends doc ready function