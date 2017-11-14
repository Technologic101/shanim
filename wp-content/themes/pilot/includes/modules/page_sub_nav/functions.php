<?php
$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
if (file_exists($filename)) {
    require $filename;
}

function build_page_sub_nav_layout()
{
    $args = array(
        'items' => get_sub_field('page_sub_nav_items')
    );
    return $args;
}

?>