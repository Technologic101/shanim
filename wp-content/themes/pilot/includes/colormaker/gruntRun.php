<?php
	include('../../../wp-load.php');

	$current_directory = __FILE__;

	$root = preg_replace( '#\\\includes\\\colormaker\\\gruntRun.php#', '', $current_directory);

	$_POST['acf']['field_5677340154128'] = true;
	$blocks = get_field('color_blocks','option');
	$start_section_comment = "/* Theme Colors */";
	$end_section_comment = "/* END Theme Colors */";
	$url =  $root . $color_args['color_css_url'];

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

				$module_name = $class_name . ".module";
				$find = array('/block-name/','/color-class-name/');
				$replace = array($block_name,$module_name);
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
		$main_min_url = $root . "/dest/css/main.min.css";
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
?>