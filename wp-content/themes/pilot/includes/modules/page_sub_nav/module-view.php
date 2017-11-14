<?php
/**
 * $args = array();
 */
global $args;
global $post;
$parent = get_post($post->post_parent)->post_title;

?>
<div class="page_sub_nav-wrap">
    <div class="page_sub_nav-inner-content">
        <?php foreach ($args['items'] as $item) : ?>
            <?php $title = get_the_title($item['link']->ID); ?>
            <div class="page_sub_nav-inner-content-block">
                <a class="<?php if (is_page($title) || $title == $parent) echo 'active'; ?>"
                   href="<?php echo get_permalink($item['link']->ID); ?>"><?php echo $title ?></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
