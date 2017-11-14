<?php
	require get_template_directory() . '/includes/modules/additional_acf_field_groups.php';
	require get_template_directory() . '/includes/modules/mapped_classes_acf_def.php';

	global $pilot;

	$pilot->modules = get_modules();

	$pilot->module_names = array();
	$pilot->layouts = array();		// will load acf layouts for modules

	foreach( $pilot->modules as $module ){
		$module_layout = array();
		$filename = get_template_directory() . '/includes/modules/' . $module . '/functions.php';
		// module's acf layout is built and added to $pilot->layouts[] in the following require
		if( file_exists ( $filename )){
			require $filename;
			$pilot->module_names[$module] = array(
				'class' => preg_replace('/_/','-',$module),
				'key' => $module_layout['key'],
				'func_name' => preg_replace('/-/','_',$module),
				'dir_name' => $module
			);
			$additional_fields = get_additional_fields( $pilot->module_names[$module] );
			foreach( $additional_fields as $field ){
				$module_layout['sub_fields'][] = $field;
			}
			// adds title field to ALL modules for Global Select
			array_unshift( $module_layout['sub_fields'], get_title_field( preg_replace('/-/','_',$module) ));
			$pilot->layouts[] = $module_layout;
		}
	}
	// all module layouts are added to the $pilot->flexible_content layouts key in the following require
	require get_template_directory() . '/includes/modules/flexible_content_acf_def.php';

	$pilot->module_containers = get_field('module_containers','option');
	require_once get_template_directory() . '/includes/modules/global_acf_def.php';
	if( is_array( $pilot->module_containers ) ){
		foreach($pilot->module_containers as $container){
			add_filter('acf/load_field/name=included_modules'.$container['container_slug'], 'acf_load_all_modules');
			create_container($container);
			if( $pilot->use_global_modules ){
				// only register the global modules on the Options Page and for the front end
				if( ( array_key_exists( 'page', $_GET ) && $_GET['page'] != 'global-modules' ) || !array_key_exists( 'page', $_GET ) ){
					$pilot->layouts[] = create_global( $container );
				}
			}	
		}
	}	
	/* ACF Custom Functions */
	function get_all_blocks( $container_name = 'content' , $is_option = false){
		global $pilot;
		$module_names = $pilot->module_names; // = array( 'dir-name-of-module- => array('class','key','func_name','dir_name'));
		$option = "";
		if( $is_option ){
			$option = 'option';
		}
		$container_name .= "_blocks";
		if( have_rows($container_name , $option ) ):
			global $i;
			$i = 0;
			while ( have_rows($container_name , $option) ): 

				the_row();

				$block_type = preg_replace( '/_block/','',get_row_layout());
				$params = array('type'=>$block_type);
				global $args;
				$args = array();
				$custom_classes = "";
				$color_class = " ";
				// checks if colormaker is loaded
				if( function_exists('get_color_class') ){ 
					if( $block_color_key = get_sub_field($block_type.'_block_color') ){
						// checks all colors as defined in colormaker settings and matches to hidden id
						$block_color = get_color_class( $block_color_key );
						$color_class .= $block_color . " module";
					}
				}
				$user_func_args = null;
				if( preg_match ('/global_/',$block_type) ){
					$block_type = "global";
					$user_func_args = array( 'container_name' => $container_name );
				}
				$args = call_user_func('build_' . $block_type . '_layout', $user_func_args); // if is global, will call build_global_layout in global_acf_def.php
				if( 'global' == $block_type ){
					$params['type'] = $args['global_type']; // sets the module type the global uses
					// globals are stored in wp_options as 'options_content_blocks_{$global_key}_images_0_image' 
					$params['global_key'] = get_sub_field('global_block_predefined_block');
 					$custom_classes .= get_option('options_content_blocks_'.$params['global_key'].'_custom_classes_'.$args['global_type']);
					if( get_option('options_content_blocks_'.$params['global_key'].'_'.preg_replace('/-/','_',$args['global_type']).'_include_global_classes')){
						$custom_classes .= get_field('global_classes','option');
					}
				}				
				if( count( $args ) > 0 ){
					if( $block_type != 'media' ){
						$args['id'] = $block_type.'_block_'.$i;
					}
					$args['acf_incr'] = $i;
					$params['args'] = $args;
					$params['classes'] = $custom_classes . $color_class;
					get_block( $params );
				}
				$i++;
			endwhile;
		endif;	
	}
				
	function get_block( $params ){
		global $pilot;
		if( $block_type = $params['type'] ){
			$args = array();
			if( array_key_exists('args', $params) ){
				$args = $params['args'];
			}
			if( array_key_exists( 'classes', $params ) ){
				if( array_key_exists( 'global_type', $args ) ){
					$mapped_classes = get_global_mapped_classes( $block_type, $params['global_key'] );
				}
				else{
					$mapped_classes = get_mapped_classes( $block_type, $args['acf_incr'] );
				}
				$custom_classes = $params['classes'] . " " .$mapped_classes;
			}
			$id = "";
			if( array_key_exists( 'id', $args ) ){
				$id = "id='".$args['id']."'";
			}
			$block_class = preg_replace('/_/','-',$block_type);
			$block_dir_name = get_dir_name_from_class($block_class);
			echo "<div class='block-".$block_type . $pilot->module_classes ." ". $custom_classes ."' ". $id . "><div class='layout-content'>";	
 				get_template_part( 'includes/modules/' . $block_dir_name . '/module', 'view' );
			echo "</div><!--/layout-content--></div><!--/block-->";
			unset($args);
		}
	}
	function get_modules(){
		$current_directory = __FILE__;
		$root = preg_replace( '#includes(.*?)modules(.*?)modules.php#', '', $current_directory);
		$path = $root . "/includes/modules";
		$dirs = glob($path . '/*' , GLOB_ONLYDIR);
		$modules = array();
		foreach( $dirs as $dir ){
			$pos = strrpos($dir, '/') + 1;
			$module = substr($dir,$pos);
			// ignore module-starter folder
			if( 'module-starter' != $module ){
				$modules[] = $module;
			}
		}
		return $modules;
	}
	function get_dir_name_from_class($class_name){
		global $pilot;
		foreach( $pilot->module_names as $module){
			if( $module['class'] == $class_name ){
				return $module['dir_name'];
			}
		}
		return false;
	}
	function acf_load_all_modules( $field ) {
		$field['choices'] = array();
		$modules = get_modules();
		foreach( $modules as $module ){
			$field['choices'][ $module ] = $module;
		}
		return $field;
	    
	}	
	add_filter('acf/load_field/name=module_type', 'acf_load_all_modules');
	function get_mapped_classes( $block_type, $acf_incr ){
		$all_meta = get_post_custom();
		$mapped_classes = "";
		foreach( $all_meta as $meta_value => $arr ){
//			if( preg_match( '/^content_blocks_([0-9]+)_class_map/', $meta_value ) && 
			if( preg_match( '/^content_blocks_'.$acf_incr.'_class_map/', $meta_value ) && 
				preg_match( '/'.$block_type.'/', $meta_value ) ){
				foreach( $arr as $value ){
					if( is_array( @unserialize( $value ) ) ){
						foreach( unserialize($value) as $val ){
							$mapped_classes .= " ".$val;
						}
					}
					else{
						$mapped_classes .= " ".$value;
					}
				}
			}
		}
		return $mapped_classes;
	}
	function get_global_mapped_classes( $block_type, $acf_incr ){
		global $pilot;
		$mapped_classes = "";
		$module_info = $pilot->module_names[$block_type];
		$module_mapping = get_class_maps_field( $module_info );
		$mapped_classes = "";
		foreach( $module_mapping as $map ){
			$test = get_option('options_content_blocks_'.$acf_incr.'_'.$map['name']);
			if( is_array( $test ) ){
				foreach( $test as $v ){
					$mapped_classes .= " ".$v;
				}
			}
		}
		return $mapped_classes;
	}
	function create_key($module=null,$name=null){
		return 'field_' . hash('md5', $module."_block".$name); 	
	}