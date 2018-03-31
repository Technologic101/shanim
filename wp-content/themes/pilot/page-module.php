<?php
/*
Template Name: Modules
*/
?>

<?php get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'views/content', 'module' ); ?>
		<?php endwhile; ?>

<?php get_footer(); ?>