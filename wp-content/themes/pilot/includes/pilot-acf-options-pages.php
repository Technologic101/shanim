<?php
/* 
 * Options Page
 * Add ACF items to an options page 
 * */

if ( function_exists('acf_add_options_page') ) {

    acf_add_options_page(
        array(
            'page_title'    => 'Site Options',
            'menu_title'    => 'Site Options',
            'menu_slug'     => 'site-options',
            'capability'    => 'edit_posts',
            'parent_slug'   => '',
            'position'      => false,
            'icon_url'      => false
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title'    => 'Theme Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-settings-header',
            'capability'    => 'edit_posts',
            'parent_slug'   => 'site-options',
            'position'      => false,
            'icon_url'      => false
        )
    );    
/*
    acf_add_options_sub_page(
        array(
            'page_title'    => 'Header',
            'menu_title'    => 'Header',
            'menu_slug'     => 'site-options-header',
            'capability'    => 'edit_posts',
            'parent_slug'   => 'site-options',
            'position'      => false,
            'icon_url'      => false
        )
    );    
    acf_add_options_sub_page(
        array(
            'page_title'    => 'Footer',
            'menu_title'    => 'Footer',
            'menu_slug'     => 'site-options-footer',
            'capability'    => 'edit_posts',
            'parent_slug'   => 'site-options',
            'position'      => false,
            'icon_url'      => false
        )
	);
*/
}
?>