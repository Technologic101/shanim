<?php
	global $pilot;
	// add module layout to flexible content 
	$module_layout = array (
		'key' => '567c4282e7add',
		'name' => 'slider_block',
		'label' => 'Slider Block',
		'display' => 'block',
		'sub_fields' => array (
			array (
				'key' => 'field_567c428fe7ade',
				'label' => 'Slides',
				'name' => 'slider_block_slides',
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
				'min' => 4,
				'max' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'sub_fields' => array (
					array (
						'key' => 'field_567c42a3e7adf',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
			),
		),
		'min' => '',
		'max' => '',
	);
?>