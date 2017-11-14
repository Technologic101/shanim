<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_57af2997e0601',
	'title' => 'Module Containers',
	'fields' => array (
		array (
			'key' => 'field_57af29a6129a2',
			'label' => 'Containers',
			'name' => 'module_containers',
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
			'layout' => 'table',
			'button_label' => 'Add Row',
			'sub_fields' => array (
				array (
					'key' => 'field_57af29e8129a3',
					'label' => 'Container Name',
					'name' => 'container_name',
					'type' => 'text',
					'instructions' => '',
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
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_57af2b198c063',
					'label' => 'Container Slug',
					'name' => 'container_slug',
					'type' => 'text',
					'instructions' => '',
					'required' => '',
					'conditional_logic' => '',
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
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'global-modules',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
	function create_container( $container ){
		global $pilot;

		$name = $container['container_name'];
		$slug = $container['container_slug'];

		if( function_exists('acf_add_options_sub_page') ) {
		    acf_add_options_sub_page(
		        array(
		            'page_title'    => $name,
		            'menu_title'    => $name,
		            'menu_slug'     => $slug,
		            'capability'    => 'edit_posts',
		            'parent_slug'   => 'site-options',
		            'icon_url'      => false
		        )
		    );
			acf_add_local_field_group(array (
				'key' => create_key($name, 'Container Definitions'),
				'title' => 'Container Definitions for ' .$name,
				'fields' => array (
					array (
						'key' => create_key($slug,'included_modules'),
						'label' => 'Included Modules',
						'name' => 'included_modules'.$slug,
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array (
						),
						'default_value' => array (
						),
						'allow_null' => 0,
						'multiple' => 1,
						'ui' => 1,
						'ajax' => 1,
						'placeholder' => '',
						'disabled' => 0,
						'readonly' => 0,
					),
					array (
						'key' => create_key($slug,'_locations'),
						'label' => 'Locations',
						'name' => $slug.'_locations',
						'type' => 'select',
						'instructions' => 'Set where this container will show up in the admin section.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array (
							'page' => 'Show on All Pages',
							'post' => 'Show on All Posts'
						),
						'default_value' => array (
						),
						'allow_null' => 0,
						'multiple' => 1,
						'ui' => 1,
						'ajax' => 1,
						'placeholder' => '',
						'disabled' => 0,
						'readonly' => 0,
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'options_page',
							'operator' => '==',
							'value' => $slug,
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

		}
		$locations = get_field( $slug.'_locations', 'option');
		$container_loc = [];
		if( is_array($locations) ){
			if( in_array ('page', $locations ) ){
				$container_loc[] =
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'page',
						),
					);
			}
			if( in_array ('post', $locations ) ){
				$container_loc[] =
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'post',
						),
					);
			}
		}
		$container_loc[] =
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'global-modules',
				),
			);

		$included_modules = get_field( 'included_modules'.$slug, 'option');
		$container_layouts = [];
		if( is_array( $included_modules ) ){
			foreach( $pilot->layouts as $key => $layout ){
				if( in_array( preg_replace('/_block/','',$layout['name']), $included_modules ) ){
					$container_layouts[] = $layout;
				} 
			}
		}

		// include global module builder
		if( $pilot->use_global_modules ){
			require_once get_template_directory() . '/includes/modules/global_acf_def.php';
			// only register the global modules on the Options Page and for the front end
			if( ( array_key_exists( 'page', $_GET ) && $_GET['page'] != 'global-modules' ) || !array_key_exists( 'page', $_GET ) ){
				$container_layouts[] = create_global($container);
			}
		}
		$pilot->containers[$slug] = array (
			'key' => create_key('group',$slug),
			'title' => $name,
			'fields' => array (
				array (
					'key' => create_key('block',$slug),
					'label' => $name . " Blocks",
					'name' => $slug . '_blocks',
					'type' => 'flexible_content',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'button_label' => 'Add a Content Block',
					'min' => '',
					'max' => '',
					'layouts' => $container_layouts,
				),
			),
			'location' => $container_loc,
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		);
		acf_add_local_field_group( $pilot->containers[$slug] );

	}
?>