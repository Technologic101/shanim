<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'pilot' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'views/content', 'search' ); ?>
		<?php endwhile; ?>
		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<?php get_template_part( 'views/content', 'none' ); ?>
	<?php endif; ?>

<?php get_footer(); ?>