<?php
	global $pilot;

/**
 * Theme Colors
 */

if( function_exists('acf_add_local_field_group') ):
	global $pilot;
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
	    acf_add_options_sub_page(
	        array(
	            'page_title'    => 'ColorMaker',
	            'menu_title'    => 'ColorMaker',
	            'menu_slug'     => 'colormaker-settings',
	            'capability'    => 'edit_posts',
	            'parent_slug'   => 'site-options',
	            'position'      => false,
	            'icon_url'      => false
	        )
	    );    

	acf_add_local_field_group(array (
		'key' => 'group_567733d11ce9f',
		'title' => 'ColorMaker Palettes',
		'fields' => array (	
			array (
				'key' => 'field_5677340154128',
				'label' => 'Palettes',
				'name' => 'color_blocks',
				'type' => 'repeater',
				'instructions' => 'This is a designer/developer tool and is not intended for general use. The front end developer must build the theme-color template in the following file: 
									src/sass/colormaker.scss. Fuller documentation can be found in the /themes/pilot/includes/colormaker/readme.txt',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => '',
				'max' => '',
				'layout' => 'block',
				'button_label' => 'Add a Palette',
				'sub_fields' => array (
					array (
						'key' => 'field_5677346054129',
						'label' => 'Palette Name',
						'name' => 'color_block_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_567734775412a',
						'label' => 'Palette CSS Class',
						'name' => 'color_block_css_class',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_56c7a09ad89cc',
						'label' => 'color block id',
						'name' => 'color_block_id',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
						),
						'wrapper' => array (
							'width' => '',
							'class' => 'hidden',
							'id' => '',
						),
					),
					array (
						'key' => 'field_567734845412b',
						'label' => 'Colors',
						'name' => 'colors',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => '',
						'max' => $color_args['number_of_colors'],
						'layout' => 'table',
						'button_label' => 'Add a Color',
						'sub_fields' => array (
							array (
								'key' => 'field_5677349b5412c',
								'label' => 'Color',
								'name' => 'color',
								'type' => 'color_picker',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
							),
						),
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'colormaker-settings',
				),
			),
		),
		'menu_order' => 1,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
	endif;
	if( function_exists('acf_add_local_field_group') ):
	
	acf_add_local_field_group(array (
		'key' => 'group_567c815ab503d',
		'title' => 'Page Settings',
		'fields' => array (
			array (
				'key' => 'field_567c81883648a',
				'label' => 'Colors',
				'name' => 'page_settings_color',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'layout' => 'horizontal',
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 1,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
	
	endif;
?>