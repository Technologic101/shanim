jQuery(document).ready(function($) {
	$('.single-image-slider .slider-block').slick({
		centerMode: true,
		centerPadding: '',
		slidesToShow: 1,
		easing: 'swing',
		arrows: true,
		autoplay: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		]
	});
	
	$('.multi-image-slider .slider-block').slick({
		centerMode: true,
		centerPadding: '100px',
		slidesToShow: 3,
		easing: 'swing',
		arrows: true,
		autoplay: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		]
	});
	
});

