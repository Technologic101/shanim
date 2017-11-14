jQuery(document).ready(function($) {
	// Accordion script
	
	var allPanels = $('.accordion > dd').hide(),
		allPanelLabels = $('.accordion > dt');
		
	$('.accordion > dt > a').click(function() {
		if ( !$(this).parent().hasClass('active') ) {
			allPanels.slideUp();
			allPanelLabels.removeClass('active');
			$(this).parent().next().slideDown();
			$(this).parent().addClass('active');
		}
		else {
			$(this).parent().removeClass('active').next().slideUp();
		}
		return false;
	});
});
