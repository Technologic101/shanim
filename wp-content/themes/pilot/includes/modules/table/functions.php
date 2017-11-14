<?php
	$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}

	function build_table_layout(){
		$args = array(
			'title' => get_sub_field('table_block_title'),
			'content' => get_sub_field('table_block_content'),
			'table'	=> get_sub_field('table_block_table')
		);
		return $args;
	}
?>