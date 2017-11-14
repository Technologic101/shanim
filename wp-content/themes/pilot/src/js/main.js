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
    console.log( "Your JS is ready" );
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
