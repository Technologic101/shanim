<?php get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'views/content', 'page' ); ?>
			<?php pilot_get_comments(); ?>
		<?php endwhile; ?>

<?php get_footer(); ?>