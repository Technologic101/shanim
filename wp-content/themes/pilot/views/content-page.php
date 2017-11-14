<?php global $pilot; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( $pilot->use_default_page_titles && !get_field('hide_title') ) : ?>
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</header>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pilot' ),
				'after'  => '</div>',
			) );
	get_all_blocks('content'); // defined in /inc/content-blocks.php
		?>

	</div><!-- .entry-content -->
	<footer class="entry-footer">
<?php get_all_blocks('footer-content'); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'pilot' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer>
</article>