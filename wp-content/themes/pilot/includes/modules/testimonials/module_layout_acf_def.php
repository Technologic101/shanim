<?php
	global $pilot;
	// add module layout to flexible content 
$module_layout = array (
	'key' => 'group_58d9aa7eded0a',
	'name' => 'testimonials_block',
	'label' => 'Testimonials',
	'display' => 'block',
	'title' => 'Testimonials',
	'sub_fields' => array (
		array (
			'key' => 'field_58d9aa909f857',
			'label' => 'Testimonials Rows',
			'name' => 'testimonials_rows',
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
			'max' => '',
			'layout' => 'block',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_58d9aae39f858',
					'label' => 'Quote',
					'name' => 'quote',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
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
					'maxlength' => '',
				),
				array (
					'key' => 'field_58d9aafd9f859',
					'label' => 'Citation Line 1',
					'name' => 'citation_line_1',
					'type' => 'text',
					'instructions' => 'Name and Age',
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
					'maxlength' => '',
				),
				array (
					'key' => 'field_58d9ab1f9f85a',
					'label' => 'Citation Line 2',
					'name' => 'citation_line_2',
					'type' => 'text',
					'instructions' => 'Gym and City',
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
					'maxlength' => '',
				),
			),
		),
	),
	'min' => '',
	'max' => ''
);
?>