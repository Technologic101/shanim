<?php get_header(); ?>
<?php get_all_blocks(); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'views/content', pilot_get_view_format() ); ?>
			<?php pilot_get_comments(); ?>
			<?php the_post_navigation(); ?>
		<?php endwhile; ?>

<?php get_footer(); ?>