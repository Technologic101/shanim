<?php
	global $pilot;
	global $color_args;
	require get_template_directory() . '/includes/colormaker/colormaker_settings_acf_def.php';

	$args = array(
		'number_of_colors' => get_field('number_of_colors','option') // max is 19; defined in colormaker_settings_acf.def.php
	);

	// do not touch defaults
	/* color_css_url MUST match the KEY in the gruntfile.js for
	 *		sass: { 
	 *			dev: { 
	 *				files: { KEY : 'src/sass/colormaker.scss' }
	 */
	$defaults = array(
		'color_css_url' => "/dest/css/colormaker.min.css", 
		'number_of_colors' => 5
	);	
	$color_args = wp_parse_args( $args, $defaults );
	if( !is_numeric( $color_args['number_of_colors'] ) ){
		$color_args['number_of_colors'] = $defaults['number_of_colors'];
	}	
	if(	$color_args['number_of_colors'] > 19 ){
		$color_args['number_of_colors'] = 19;
	}
	$i = 1;
	while( $i <= $color_args['number_of_colors'] ){
		$key = 'color-'.$i;
		$value = 'colormaker_'.number_to_word( $i );
		$color_args['colors'][$key] = $value;
		$i++;
	}
	require get_template_directory() . '/includes/colormaker/colormaker_acf_def.php';
/**
 * Theme Colors
 */

function update_theme_colors_css( $post_id ) {
	global $color_args;

	if( empty($_POST['acf']['field_5677340154128']) ) {    
        return;        
    }


	$blocks = get_field('color_blocks','option');
	$start_section_comment = "/* Theme Colors */";
	$end_section_comment = "/* END Theme Colors */";
	if( preg_match('/wp-admin/',$_SERVER['SCRIPT_FILENAME'])){
		$template_directory = substr( get_template_directory_uri(), strpos( get_template_directory_uri(), 'wp-content'));
		$endstrpos = strpos($_SERVER['SCRIPT_FILENAME'],'wp-admin');
		$root = substr($_SERVER['SCRIPT_FILENAME'], 0, $endstrpos );
		$url = $root ."/". $template_directory . $color_args['color_css_url'];
	}
	else{
		$current_directory = __FILE__;
	
		$root = preg_replace( '#\\\includes\\\colormaker\\\gruntRun.php#', '', $current_directory);

		$url = $root . $color_args['color_css_url'];
	}
	$template = file_get_contents( $url );
	if( is_array( $blocks ) ){
		$css_contents = $start_section_comment;
		foreach( $blocks as $block ){
			$colors = $block['colors'];
			if( is_array( $colors ) ){
				$block_name = $block['color_block_name'];
				$class_name = $block['color_block_css_class'];
				$find = array('/block-name/','/color-class-name/');
				$replace = array($block_name,$class_name);
				$this_block = preg_replace($find,$replace,$template);
				foreach( $colors as $key=>$color ){
					$color_num = 'color-' .($key+1);
					$find = "/" . $color_args['colors'][$color_num] . "/";
					$this_block = preg_replace($find, $color['color'] ,$this_block);
				}
				$css_contents .= "\n".$this_block;
			}
		}
		$css_contents .= "\n". $end_section_comment . "\n";
		$main_min_url = $root ."/". $template_directory . "/dest/css/main.min.css";
		$main_min_contents = file_get_contents( $main_min_url );
		$start_of_colors = strpos( $main_min_contents, $start_section_comment  ) ;
		$end_of_colors = strpos( $main_min_contents, $end_section_comment  );
		if( $end_of_colors > 0 ){
			$end_of_colors += strlen($end_section_comment);
		}
		$start_of_contents = substr( $main_min_contents, 0, $start_of_colors );
		$end_of_contents = substr( $main_min_contents, $end_of_colors );
		$new_content = $start_of_contents . $css_contents . $end_of_contents;
		file_put_contents($main_min_url, $new_content);
	}
}
add_action('acf/save_post', 'update_theme_colors_css', 20);

add_action('acf/input/admin_footer', function(){ ?>
	<script type="text/javascript">
		(function($) { 
			$("[data-event='remove-row']").on('click', function( e ){
				return confirm("Click 'OK' to delete this"); 
		}) })(jQuery);	
	</script>
<?php	
});
add_filter('acf/load_field/name=page_settings_color', 'acf_load_color_field_choices');
if( is_object( $pilot ) && $pilot->include_modules && property_exists( $pilot, 'modules' ) && count( $pilot->modules ) > 0 ){
	$blocks = $pilot->modules;
}
else{
	$blocks = array('info','media','slider','table','posts_slider', 'banner','accordion', 'image_popup', 'people', 'generic_content');
}
foreach( $blocks as $block => $block_info ){
	$name = $block_info .= "_block_color";
	add_filter('acf/load_field/name=' . $name, 'acf_load_color_field_choices');
}

function acf_load_color_field_choices( $field ) {
	$field['choices'] = array();
	$choices = array('None');
    if( have_rows('color_blocks','option') ):
		$i = 1;
		while ( have_rows('color_blocks','option') ) : the_row();
			$css_class = get_sub_field('color_block_css_class');
			$block_name = get_sub_field('color_block_name');
			if( have_rows('colors') ):
					$block_demo = "<div style='display:inline-block;'><label style='display:block;'>" . $block_name . "</label><div class='color-block-demo' style='display:inline-block;'>";
					while ( have_rows('colors') ) : the_row();
						$color = get_sub_field('color');
						$block_demo .= "<div style='background-color:" . $color . "; height:20px; width:100px;'></div>";
					endwhile;
					$choices[$i] = $block_demo . "</div>"; 
			endif;
			$i++;
		endwhile;
	endif;
	if( count($choices)>1 ) {
		foreach( $choices as $key => $choice ) {
			$field['choices'][ $key ] = $choice;	
		}	
	}
	else{
			$field['choices'][] = "<span>No Color Blocks are defined. <a href='".admin_url()."/admin.php?page=colormaker-settings'>Define them.</a></span>";	
	}
	return $field;
}

global $color_blocks;
function get_color_blocks(){
	global $color_blocks;
	if( count( $color_blocks ) < 1 ){
		$color_blocks = get_field('color_blocks','option');
	}
	return $color_blocks;
}
function get_color_class( $id ){
	$color_blocks = get_color_blocks();
	if( is_array( $color_blocks ) ){
		foreach( $color_blocks as $key => $block ){
			if( $id == $block['color_block_id'] ){
				return $block['color_block_css_class'];	
			}
		}
	}
}
function my_acf_save_post( $post_id ) {
    if( empty($_POST['acf']) ) {        
        return;
    }
	if( array_key_exists( 'field_5677340154128', $_POST['acf'] )){
		$i = 0;
		foreach( $_POST['acf']['field_5677340154128'] as $key => $color_block ){
			$i++; // starts at 1
			$_POST['acf']['field_5677340154128'][$key]['field_56c7a09ad89cc'] = $i;
		}
	}
}
add_action('acf/save_post', 'my_acf_save_post', 1);

add_action( 'body_class', 'add_color_class_to_page');
function add_color_class_to_page( $classes ) {
	$color_block_key = get_field('page_settings_color');
	if( $color_block_key ){
		$classes[]= get_color_class( $color_block_key);
	}
	else{
		// some default method
		/*
			$colors = get_field('color_blocks','option');
			if( count( $colors ) > 0){
				$classes[] = $colors[0]['color_block_css_class'];
			}
		*/

	}
	return $classes;
}
function number_to_word( $num = '' )
{
	$num_list  = array('','one','two','three','four','five','six','seven',
		'eight','nine','ten','eleven','twelve','thirteen','fourteen',
		'fifteen','sixteen','seventeen','eighteen','nineteen');
	return $num_list[$num];
}

?>