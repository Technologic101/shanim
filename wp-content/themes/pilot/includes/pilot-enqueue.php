<?php
/**
 * Enqueue scripts and styles.
 */
function pilot_scripts() {

    wp_enqueue_style( 'pilot-style', get_template_directory_uri().'/dest/css/main.min.css');

	wp_deregister_script('jquery');
	wp_register_script('jquery', ('//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'), false, '2.1.4', true);

	wp_enqueue_script( 'pilot-libraries', get_template_directory_uri() . '/dest/js/lib.min.js', array('jquery'), '20120206', true );
	wp_enqueue_script( 'pilot-wow', get_template_directory_uri() . '/bower_components/wow/dist/wow.js', array('jquery'), '20120206', false );
    wp_enqueue_script( 'pilot-scripts', get_template_directory_uri() . '/dest/js/app.min.js', array('jquery'), '20120206', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// enqueue styles and scripts
	wp_localize_script( 'sorcery-scripts', 'ajax', array('ajaxurl' => admin_url('admin-ajax.php'),) );

}
add_action( 'wp_enqueue_scripts', 'pilot_scripts' );

function load_maxwell_admin_style() {
        wp_register_style( 'maxwell_admin_css', get_template_directory_uri() . '/includes/modules/admin-modules.css', false, '1.0.0' );
        wp_enqueue_style( 'maxwell_admin_css' );
		wp_enqueue_script( 'maxwell_admin_js',  get_template_directory_uri() . '/includes/modules/admin-modules.js' , array('jquery'));
}
add_action( 'admin_enqueue_scripts', 'load_maxwell_admin_style' );