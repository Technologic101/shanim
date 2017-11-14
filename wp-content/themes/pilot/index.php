<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<header><h1 class="page-title screen-reader-text"><?php pilot_get_title(); ?></h1></header>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'views/content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
		<?php else : ?>
			<?php get_template_part( 'views/content', 'none' ); ?>
		<?php endif; ?>

<?php get_footer(); ?>