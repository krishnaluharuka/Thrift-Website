;(function($) {
'use strict'
// Dom Ready
	$(function() {
		
		if( $("#joyas-mega-menu").length ){
			$("#joyas-mega-menu").on('click', function(e){
				$(this).find('ul.menu').toggleClass('active');
			});	
		}
		
	});
})(jQuery);