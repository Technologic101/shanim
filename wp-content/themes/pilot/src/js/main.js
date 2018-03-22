(function() {

    wow = new WOW({
        boxClass:     'wow',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       true,       // default
        live:         true        // default
    });
    wow.init();

})();

jQuery(document).ready(function($) {
	$(document).scroll(function() {
	    var x = $(this).scrollTop();
	    if ( $(window).width() > 768 ) {
	        $('.home .block-media:first-child .bg-image').css({
	            'transform' : 'translateY(' + x/1.5 + 'px)'
	        });
	        $('.home .block-media:first-child .title-wrap').css({
	            'transform' : 'translateY(' + x/3 + 'px)',
	            'opacity': 1 - (x/300)
	        });
	    }
	});
});

jQuery(document).ready(function($) {
	// Initiate magnific

	$(".mfp-media a").magnificPopup({
		type:'iframe',
		closeMarkup: '<button title="%title%" type="button" class="mfp-close"></button>'
	});

	$(".mfp-slide").magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: true
		}
	});
});
