<?php global $pilot; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( $pilot->use_default_page_titles && !get_field('hide_title') ) : ?>
		<header class="entry-header">
			<?php
				if ( is_single() ) {
					the_title( '<h2 class="entry-title">', '</h2>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
	
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php pilot_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pilot' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pilot' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php pilot_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->