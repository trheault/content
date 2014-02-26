(function ($) {
$(document).ready(function(){
	    $('#idfgMenu').load('//fishandgame.idaho.gov/i/services/site/menu', function() {	
			$('#menu').mobileMenu({prependTo:'#idfgMenu', topOptionText:' -- Site Menu -- ' });
		});
});
})(jQuery);