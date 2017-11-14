<?php
global $pilot;
// add module layout to flexible content
$module_layout = array(
    'key' => '4f0cdd6ac8z1',
    'name' => 'auto_link_list',
    'label' => 'Section Link List',
    'display' => 'block',
    'sub_fields' => array(
        array (
            'key' => 'field_4f0cdd6ac8e5',
            'label' => 'Small List?',
            'name' => 'small_list',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => 100,
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
        ),
        array (
            'key' => 'field_4f0cdd6ac8z2',
            'label' => 'Has Parent?',
            'name' => 'is_parent',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => 100,
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
        )
    )
);

?>