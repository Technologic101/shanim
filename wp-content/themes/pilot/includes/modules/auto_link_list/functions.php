<?php
$filename = get_template_directory() . '/includes/modules/' . $module . '/module_layout_acf_def.php';
if (file_exists($filename)) {
    require $filename;
}

function build_auto_link_list_layout()
{
    $args = array(
        'small_list' => get_sub_field('small_list'),
        'is_parent' => get_sub_field('is_parent'),
        'items' => get_sub_field('arrow_list_items')
    );
    return $args;
}

?>