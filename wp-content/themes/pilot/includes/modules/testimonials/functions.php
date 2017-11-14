<?php
	$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}

	function build_testimonials_layout(){
		if( have_rows('testimonials_rows') ):
			$rows = array();
			while ( have_rows('testimonials_rows') ) : 
				the_row();
				$rows[] = array(
					'title' => get_sub_field('quote'),
					'citation-line-1' => get_sub_field('citation_line_1'),
					'citation-line-2' => get_sub_field('citation_line_2')
				);
			endwhile;
			$args['rows'] = $rows;
		endif;
		return $args;
	}	
?>