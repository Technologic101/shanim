<?php
	$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}
	function build_multi_layout(){
		$custom_classes = " " . get_sub_field('multi_block_custom_class');
		$args = array(
			'title' => get_sub_field('multi_block_title'),
			'subtitle' => get_sub_field('multi_block_subtitle'),
			'content' => get_sub_field('multi_block_content'),
			'overlay_color' => get_sub_field('multi_block_overlay_color'),
			'overlay_opacity' => get_sub_field('multi_block_overlay_opacity')
		);
		if( get_sub_field('multi_block_modify') ){
			if( $opacity = get_sub_field('multi_block_overlay_opacity') ){
				$args['overlay_opacity'] = $opacity;
			}
			if( $color = get_sub_field('multi_block_overlay_color') ){
				$args['overlay_color'] = $color;
			}
		}				
		$image = get_sub_field('multi_block_image');
		if( is_array( $image ) ){
			$args['bg_image_url'] = $image['url'];
		}
		$column_image = get_sub_field('multi_block_column_image');
		if( is_array( $column_image ) ){
			$args['column_image_url'] = $column_image['url'];
		}
		return $args;
	}

?>