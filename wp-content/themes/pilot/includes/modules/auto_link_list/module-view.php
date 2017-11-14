<?php
/**
 * $args = array();
 */
global $args;
global $post;
$is_parent = $args['is_parent'];

//depending on the actual page, query for either the posts children or parent

$children = get_pages( array( 'child_of' => $is_parent ? $post->post_parent : $post->ID  ) );
?>
<div class="arrow_link_list-wrap <?php echo $args['small_list'] ? 'small-list':'' ?>">
    <div class="arrow_link_list-inner-content">
        <?php foreach ($children as $aPost) : ?>
            <?php $title = $aPost->post_title; ?>
            <a href="<?php the_permalink($aPost) ?>" class="arrow_link_list-link-container <?php if (is_page($title)) echo 'active'; ?>">
                <div class="arrow_link_list-link">
                    <div><?php echo $title ?></div>
                </div>
                <?php if (!$args['small_list']) : ?>
                    <div class="arrow_link_list-arrow">
                        <?php get_template_part('views/icons/arrow'); ?>
                    </div>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>

    </div>
</div>
