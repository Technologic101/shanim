<?php global $pilot; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( $pilot->use_default_page_titles && !get_field('hide_title') ) : ?>
		<header class="entry-header screen-reader-text">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</header>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php get_all_blocks(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
</article>