<?php
$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
if( file_exists ( $filename )){
    require $filename;
}

function build_post_slides_layout(){
	$posts = wp_get_recent_posts( array('numberposts' => 3 ) );
	if( count($posts) > 0  ){
		$posts_arr = [];
		foreach( $posts as $post ){
			setup_postdata($post);
			$id = $post['ID'];
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ) );
			$posts_arr[] = array(
				'image' => $image[0],
				'post_title' => $post['post_title'],
				'content' => apply_filters('the_excerpt', get_post_field('post_excerpt', $id)),
				'permalink' => get_permalink( $id)
			);
		}
	    $args = array(
			'title' => get_sub_field('post_slides_block_title'),
	        'posts' => $posts_arr
	    );
	    return $args;
	}
}
?>