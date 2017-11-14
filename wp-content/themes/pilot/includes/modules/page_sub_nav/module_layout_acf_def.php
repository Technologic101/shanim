<?php
global $pilot;
// add module layout to flexible content
$module_layout = array(
    'key' => '2823c5c0d637',
    'name' => 'page_sub_nav',
    'label' => 'Section Navigation',
    'display' => 'block',
    'sub_fields' => array(
        array(
            'key' => 'field_2823c5c0d638',
            'label' => 'Items',
            'name' => 'page_sub_nav_items',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'collapsed' => '',
            'min' => '1',
            'max' => '6',
            'layout' => 'table',
            'button_label' => 'Add Row',
            'sub_fields' => array(
                array(
                    'key' => 'field_2823c5c0d639',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'post_object',
                    'instructions' => '',
                    'required' => 1,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '255',
                    'readonly' => 0,
                    'disabled' => 0,
                ))
        )
    ),
    'min' => '',
    'max' => '',
);

?>