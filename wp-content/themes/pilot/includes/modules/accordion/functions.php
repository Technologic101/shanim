<?php
	$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}

	function build_accordion_layout(){
		$args = array(
			'title' => get_sub_field('accordion_block_title'),
			'content' => get_sub_field('accordion_block_content'),
			'rows' => get_sub_field('accordion_block_rows')
		);
		return $args;
	}
?>