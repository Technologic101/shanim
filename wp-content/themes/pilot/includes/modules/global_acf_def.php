<?php
if( function_exists('acf_add_options_sub_page') ) {
    acf_add_options_sub_page(
        array(
            'page_title'    => 'Global Modules',
            'menu_title'    => 'Global Modules',
            'menu_slug'     => 'global-modules',
            'capability'    => 'edit_posts',
            'parent_slug'   => 'site-options',
            'position'      => 3.3,
            'icon_url'      => false
        )
    );    
}
global $pilot;
// add module layout to flexible content 
function create_global( $container ){
	$slug = $container['container_slug'];
	$choices = load_global_blocks($slug);
	return	array (
					'key' => create_key('global_block',$slug),
					'name' => 'global_block_'.$slug,
					'label' => 'Predefined Blocks',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => create_key('global_block_predefined_block', $slug),
							'label' => 'Choose your predefined Block',
							'name' => 'global_block_predefined_block_'.$slug,
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => $choices,
							'default_value' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
					),
					'min' => '',
					'max' => '',
				);
}
function load_global_blocks( $slug ) {
	$choices = array('' => 'None');
	$rows = get_option('options_'.$slug.'_blocks');
	global $wpdb;
	if( is_array( $rows ) ){
		foreach( $rows as $key => $row ){	
			$array = $wpdb -> get_results(
				$wpdb->prepare( 
					"
						SELECT * 
						FROM wp_options
						WHERE option_name LIKE %s
					",
					'options_'.$slug.'_blocks_'.$key.'_'.$row.'_title'
				)
			);
			$obj = $array[0];
			$choices[] = $obj->option_value;
		}
	}
	return $choices;    
}

function build_global_layout( $args ){
	$container_name = $args['container_name'];
	// globals are stored in wp_options as 'options_content_blocks_{$global_key}_images_0_image'; 'global_block_defined_block' saves the $global_key
	$global_key = get_sub_field('global_block_predefined_block');
	$i = 0;
	if( have_rows( $container_name , 'option' ) ):
		while ( have_rows($container_name , 'option') ): 
			the_row();
			if( $i == $global_key ):
				$test_block_type = preg_replace( '/_block/','',get_row_layout());
				$args = call_user_func('build_' . $test_block_type . '_layout');
				$args['global_type'] = preg_replace('/_/','-',$test_block_type);
			endif;
			$i++;
		endwhile;
	endif;
	return $args;
}

?>