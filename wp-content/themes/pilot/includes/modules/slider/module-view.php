<?php 
	/**
	 * string	$args['title']
	 * array	$args['slides']
	 * string	$args['slides'][0]['type'] 		// define a type in acf; allows us to use the same slider block for multiple data sources
	 * array	$args['slides'][0]['image'] 	// an acf image array
	 *
	 * slick slider is called from src/js/main.js
	 */

	global $args; 
	$type = $args['slide_type'];
?>
<h3><?php echo $args['title']; ?></h3>
<?php if( count($args['slides']) > 0 ) : ?>
	<div class="slider-block wow animated fadeInUp">
		<?php foreach( $args['slides'] as $slide ): ?>

			<?php if( 'slide' == $type ) : ?>
				<div class="slide">
					<a class="mfp-slide" href="<?php echo $slide['image']['url']; ?>" data-effect="mfp-zoom-in">
						<div class="bg-image" style="background-image: url(<?php echo $slide['image']['url']; ?>)"></div>
					</a>
				</div>
			<?php endif; ?>

			<?php if( 'image' == $type ) : ?>
				<div class="image-only">
					<a class="mfp-slide" href="<?php echo $slide['image']['url']; ?>" data-effect="mfp-zoom-in">
						<div class="bg-image" style="background-image: url(<?php echo $slide['image']['url']; ?>)"></div>
					</a>
				</div>
			<?php endif; ?>

		<?php endforeach; ?>
	</div>
<?php endif; ?>
