<?php
	function get_additional_fields( $module_info ){
		global $pilot;
		$module = $module_info['func_name'];
		$module_mapping = get_class_maps_field( $module_info );
		foreach( $module_mapping as $field ){
			$additional_fields[] = $field;
		}
		if( $pilot->use_colormaker ){
			$additional_fields[] = get_block_color_fields( $module );
		}		
		return $additional_fields;
	}
	function get_title_field( $module){
		$field = array (
				'key' => 'field_56951fdc7c2f6'.$module,
				'label' => 'Title',
				'name' => $module.'_block_title',
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
			);
		return $field;
	}
	function get_global_class_field( $module ){
		global $pilot;
		// add global classes
		$module_keys = get_field('modules_to_default','option');
		$default_value = 0;
		if( is_array( $module_keys ) ){
			foreach( $module_keys as $key ){
				$modules_to_default[] = $pilot->modules[$key];
			}
			if( in_array( $module , $modules_to_default ) ){
				$default_value = 1;
			}
		}
		$field = array (
			'key' => 'field_574910d0f7474'.$module,
			'label' => 'Check to Include Global Classes',
			'name' => $module.'_include_global_classes',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => $default_value,
		);
		return $field;
	}
	function get_class_maps_field( $module_info ){
		global $pilot;
		$module = $module_info['func_name'];
		// add global classes
		$class_map_modules = get_field('class_map_modules','option');
		$fields = [];
		if( is_array( $class_map_modules ) ){
			foreach( $class_map_modules as $cmm ){
				if( in_array( $module, $cmm['module_type'] ) ){
					if( is_array( $cmm['class_groups'] ) ){
						foreach( $cmm['class_groups'] as $class_group ){
							if( $class_group['allow_multiple_choices'] == 1 ){
								$type = 'checkbox';
							}
							else{
								//$type = 'radio';
								$type = 'checkbox';
							}
							$choices = [];
							foreach( $class_group['class_maps'] as $cmap){
								$key = $cmap['selector'];
								$choices[$key] = $cmap['class_name']; 
							}
							$fields[] = array (
								'key' => 'field_5760969cb4592'.$class_group['group_name'].$module,
								'label' => $class_group['group_name'],
								'name' => 'class_map_'.$class_group['group_name'].$module,
								'type' => $type,
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
								'layout' => 'vertical',
								'toggle' => 0,
							);
						}
					}
				}
			}
		}
		return $fields;
	}

	function get_block_color_fields( $module ){
		$field = array (
			'key' => 'field_568e6c04f59bb'.$module,
			'label' => 'Block Color',
			'name' => $module.'_block_color',
			'type' => 'radio',
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
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
		);
		return $field;
	}
	function acf_load_modules_to_default( $field ) {
		global $pilot;
		$field['choices'] = array('' => 'None');
		global $wpdb;
		if( is_array( $pilot->modules ) ){
			foreach( $pilot->modules as $key => $module ){	
				$field['choices'][$key] = $module;
			}
		}
		return $field;    
	}
	add_filter('acf/load_field/name=modules_to_default', 'acf_load_modules_to_default');

?>