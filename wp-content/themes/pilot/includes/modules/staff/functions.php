<?php
	$filename = get_template_directory() . '/lib/modules/' . $module . '/module_layout_acf_def.php';
	if( file_exists ( $filename )){
		require $filename;
	}

	function build_staff_layout(){
		$people = get_sub_field('staff');
		$args['description'] = get_sub_field('group_description');
		$args['title'] = get_sub_field('staff_block_title');
		foreach( $people as $person ){
			$people_image = get_field('people_image', $person->ID);
			$url = "";
			if( is_array( $people_image)){
				$url = $people_image['url'];
			}
			$args['images'][] = array(
				'url' => $url,
				'title'  => $person->post_title,
				'subtitle' => get_field('people_tagline', $person->ID),
				'popup_content' => get_field('people_bio',$person->ID)
			);					
		}
		return $args;
	}
?>