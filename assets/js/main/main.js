/* --------------------------------------------
 MAIN FUNCTION
-------------------------------------------- */
$(document).ready(function() {
    
	/* --------------------------------------------------------
	 ANIMATED PAGE ON REVEALED
	----------------------------------------------------------- */
	$(function($) {
		"use strict";
		$('.animated').appear(function() {
			var elem = $(this);
			var animation = elem.data('animation');
			if ( !elem.hasClass('visible') ) {
				var animationDelay = elem.data('animation-delay');
				if ( animationDelay ) {

					setTimeout(function(){
					 elem.addClass( animation + " visible" );
					}, animationDelay);

				} else {
					elem.addClass( animation + " visible" );
				}
			}
		});
	});

    /* --------------------------------------------------------
	 PAGE LOADER
	----------------------------------------------------------- */
    $(function() {
		"use strict";		
        $("body").imagesLoaded(function(){
            $(".loader-item").delay(700).fadeOut();
            $("#pageloader").delay(800).fadeOut("slow");
        });
	});

}(jQuery));
