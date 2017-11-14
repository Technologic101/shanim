<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _s_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}

add_action('customize_register', '_s_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _s_customize_preview_js()
{
	wp_enqueue_script('_s_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
}

add_action('customize_preview_init', '_s_customize_preview_js');


function sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function add_header_footer_logo($wp_customize) {
	$wp_customize->add_setting(
		'header_logo'
	);
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo',
		array(
			'label' => 'Header Logo',
			'section' => 'title_tagline',
			'settings' => 'header_logo',
		)));
	$wp_customize->add_setting(
		'footer_logo'
	);
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo',
		array(
			'label' => 'Footer Logo',
			'section' => 'title_tagline',
			'settings' => 'footer_logo',
		)));
}
function add_footer_content($wp_customize){


	$wp_customize->add_section(
		'footer',
		array(
			'title' => 'Footer Settings',
			'description' => 'Change the content of the footer. e.g. Address, Phone Number, copyright',
			'priority' => 35,
		)
	);

	$wp_customize->add_setting(
		'copyright_textbox',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);

	$wp_customize->add_control(
		'copyright_textbox',
		array(
			'label' => 'Copyright text',
			'section' => 'footer',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'address_1_textbox',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);

	$wp_customize->add_control(
		'address_1_textbox',
		array(
			'label' => 'Street Address',
			'section' => 'footer',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'address_2_textbox',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);

	$wp_customize->add_control(
		'address_2_textbox',
		array(
			'label' => 'City, State and Zip',
			'section' => 'footer',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'phone_textbox',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);

	$wp_customize->add_control(
		'phone_textbox',
		array(
			'label' => 'Phone Number',
			'section' => 'footer',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'fax_textbox',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);

	$wp_customize->add_control(
		'fax_textbox',
		array(
			'label' => 'Fax Number',
			'section' => 'footer',
			'type' => 'text',
		)
	);


}
function add_pilot_theme_menus($wp_customize)
{

	add_header_footer_logo($wp_customize);
	add_footer_content($wp_customize);

}

add_action('customize_register', 'add_pilot_theme_menus');
