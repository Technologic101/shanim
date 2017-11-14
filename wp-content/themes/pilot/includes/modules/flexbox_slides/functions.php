<?php
$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
if( file_exists ( $filename )){
    require $filename;
}

function build_flexbox_slides_layout(){
    $args = array(
		'title' => get_sub_field('flexbox_slides_block_title'),
        'columns' => get_sub_field('flexbox_slides_columns')
    );
    return $args;
}
?>