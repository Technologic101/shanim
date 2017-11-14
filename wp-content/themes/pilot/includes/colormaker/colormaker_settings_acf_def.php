<?php
	acf_add_local_field_group(array (
		'key' => 'group_982130gs7620ss23',
		'title' => 'ColorMaker Settings',
		'fields' => array (
			array (
				'key' => 'field_this56cc887fc3e04',
				'label' => 'Number of Colors per Palette',
				'name' => 'number_of_colors',
				'type' => 'number',
				'instructions' => 'Save Options (on right) to update number allowed in Palettes',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '19',
				'step' => '',
				'readonly' => 0,
				'disabled' => 0,
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
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
