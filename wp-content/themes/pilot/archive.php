<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'views/content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>

	<?php else : ?>

		<?php get_template_part( 'views/content', 'none' ); ?>

	<?php endif; ?>

<?php get_footer(); ?>