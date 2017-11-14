<?php
	$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}
	function build_alternating_layout(){
		if( have_rows('alternating_block_rows') ):
			$rows = array();
			while ( have_rows('alternating_block_rows') ) : the_row();
				$custom_link = get_sub_field('alternating_block_button_custom_link');		
				if( $custom_link ){ 
					$button_link = $custom_link;
				}
				else{
					$button_link = get_sub_field('alternating_block_button_link');
				}
				$rows[] = array(
					'title' => get_sub_field('alternating_block_title'),
					'text' => get_sub_field('alternating_block_text'),
					'image' => get_sub_field('alternating_block_image'),
					'button_text' => get_sub_field('alternating_block_button_text'),
					'button_link' => $button_link
				);
			endwhile;
			$args['rows'] = $rows;
		endif;
		return $args;
	}

?>