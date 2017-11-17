<?php
	global $pilot;
	// add module layout to flexible content 
$module = 'staff';
$module_layout = array(
  'key' => create_key($module),
  'name' => 'staff_block',
  'label' => 'Staff Block',
  'display' => 'block',
	'sub_fields' => array (
		array (
			'key' => 'field_59b858ea952f8',
			'label' => 'Staff',
			'name' => 'staff',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'people',
			),
			'taxonomy' => array (
			),
			'allow_null' => 0,
			'multiple' => 1,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_59bb04a843243',
			'label' => 'Group Description',
			'name' => 'group_description',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
		),
	),
	'min' => '',
	'max' => ''
);

?>