<?php global $pilot; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( $pilot->use_default_page_titles && !get_field('hide_title') ) : ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php pilot_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php pilot_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
