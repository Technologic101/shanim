<?php
	$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}
	function build_generic_content_layout(){
		$args = array(
			'title' => get_sub_field('generic_content_block_title'),
			'content' => get_sub_field('generic_content_block_content'),
		);
		return $args;
	}
?>