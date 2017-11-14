<?php
	$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}

	function build_media_layout(){
		global $i;
		$suffixes = array( '', '_second' );
		foreach( $suffixes as $suffix ){
			$link = "";
			$link_post = get_sub_field('media_block_link'.$suffix);
			if( is_object( $link_post ) ){
				$link = get_permalink($link_post->ID);
			}
			$block_width = get_sub_field('media_block_width');
			$custom_classes = " " . preg_replace('/_/','-',$block_width) . " " . get_sub_field('media_block_custom_class');
			$button_object = ( get_sub_field('media_block_button_href'.$suffix) ? get_sub_field('media_block_button_href'.$suffix) : get_sub_field('media_block_custom_button_href'.$suffix) );
			if( is_object( $button_object ) ){
				$button_href = get_permalink( $button_object->ID);
			}
			else{
				$button_href = $button_object;
			}
			$media_args = array(
				'width' => $block_width,
				'width_class' => preg_replace('/_/','-',$block_width),
				'subtitle' => get_sub_field('media_block_subtitle'.$suffix),
				'button_text' => get_sub_field('media_block_button_text'.$suffix),
				'button_href' => $button_href,
				'id' => 'media_block_'.$i,
				'overlay_color' => '',
				'overlay_opacity' => '',
				'left_align_title' => get_sub_field('left_align_title')

			);
			if( 'title' == get_sub_field('media_block_logo_or_title'.$suffix) ){
				$media_args['title'] = get_sub_field('media_block_title'.$suffix);
			}
			else{
				$media_args['logo'] = get_sub_field('media_block_logo'.$suffix);
			}
			if( get_sub_field('media_block_modify'.$suffix) ){
				if( $opacity = get_sub_field('media_block_overlay_opacity'.$suffix) ){
					$media_args['overlay_opacity'] = $opacity;
				}
				if( $color = get_sub_field('media_block_overlay_color'.$suffix) ){
					$media_args['overlay_color'] = $color;
				}
			}				
			$type = get_sub_field('media_block_type'.$suffix);
			if( $type == 'image' ){
				$image = get_sub_field('media_block_image'.$suffix);
				if( is_array( $image ) ){
					$media_args['image_url'] = $image['url'];
				}
			}
			if( $type == 'video_url' ){
				$mp4_file = get_sub_field('media_video_file_mp4'.$suffix);
				$fallbackImage = get_sub_field('media_block_video_fallbackimage'.$suffix);
				if( is_array( $mp4_file ) ){
					$media_args['video_file_mp4'] = $mp4_file['url'];
					$media_args['fallback_image_url'] = $fallbackImage['url'];
				}
			}
			$args[] = $media_args;
		}
//print_r($args);
		if( is_array( $args ) ){
			return $args;
		}
	}
?>