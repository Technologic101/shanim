<?php
	global $pilot;

	$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}

	function build_slider_layout(){
		add_action( 'wp_enqueue_scripts', 'enqueue_slick' );
		wp_enqueue_style( 'slick', get_template_directory_uri().'/dest/css/slick.css');
		$args = array(
			'slide_type' => 'slide',
			'title' => get_sub_field('slider_block_title'),
			'slides' => get_sub_field('slider_block_slides')
		);
		return $args;
	}
	function enqueue_slick(){
		global $pilot;
		/* Slick Slider */
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/dest/js/slick.min.js', array('jquery'), '1.0.0', true );
	    
		
	}
?>