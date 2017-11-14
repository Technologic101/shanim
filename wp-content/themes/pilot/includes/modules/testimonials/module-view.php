<?php 
	/**
	 * string	$args['rows']
	 * string	$args['rows'][0]['quote']
	 * string	$args['rows'][0]['citation-line-1']
	 * string	$args['rows'][0]['citation-line-2']
	 */
	global $args;
?>

<div class="testimonials">
	<?php foreach( $args['rows'] as $row ) : ?>
		<div class="testimonial-wrap">
			<p><?php echo $row['title']; ?></p>
			<span class="cite-1"><?php echo $row['citation-line-1']; ?></span>
			<span class="cite-2"><?php echo $row['citation-line-2']; ?></span>
		</div>
	<?php endforeach; ?>
</div>
