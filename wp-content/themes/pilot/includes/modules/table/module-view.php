<?php 
	/**
	 * string	$args['title']
	 * string	$args['content']
	 * array	$args['table']
	 * string	$args['table']['left_text'] 
	 * string	$args['table']['right_text'] 
	 * string	$args['table']['link'] 
	 */
	global $args; 
?>
<div class="table-content">
	<section class="wow fadeInUp" data-wow-duration="1s">
		<h3><?php echo $args['title']; ?></h3>
		<?php echo $args['content']; ?>
	</section>
</div>
<?php if( count($args['table']) > 0 ) : ?>
	<div class="table-links">
		<section class="wow fadeInUp" data-wow-duration="1s">
			<?php if( is_array( $args['table'] ) ) : ?>
				<?php foreach( $args['table'] as $row ): ?>
					<div>
						<span class="link-title"><?php echo $row['left_text']; ?></span>
						<span class="link-wrap"><a href="<?php echo $row['link']; ?>"><?php echo $row['right_text']; ?></a></span>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
	  </section>
	</div>
<?php endif; ?>
