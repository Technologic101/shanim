<?php
function pilot_setup() {

	load_theme_textdomain( 'pilot', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'pilot' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action( 'after_setup_theme', 'pilot_setup' );

/**
 * Register widget area.
 */
function pilot_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pilot' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
global $pilot;
// see global var $pilot_sidebar in functions.php to turn on sidebar
if( $pilot->sidebar ){
	add_action( 'widgets_init', 'pilot_widgets_init' );
}

add_action('after_switch_theme', 'pilot_setup_options');
function pilot_setup_options () {
	require get_template_directory() . '/includes/pilot-theme-activation.php';
}

add_action('switch_theme', 'pilot_destroy_options');
function pilot_destroy_options () {
	require WP_CONTENT_DIR . '/themes/pilot/includes/pilot-theme-deactivation.php';
}

/* Hide ACF by Default (turn on in pilot-superadmin-settings.php) */
if( is_admin() ){
	add_filter('acf/settings/show_admin', function(){ return false; });
}