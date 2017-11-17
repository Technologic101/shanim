<?php 
	/**
	 * array	$args['title']
	 * array  $args['images'] 
	 * WYSIWYG $args['description']
	 */
	global $args; 
?>

<?php if ($args['title']) : ?>
	<h3><?php echo $args['title']; ?></h3>
<?php endif; ?>
<?php if ($args['description']) : ?>
	<div class="group-description">
		<?php echo $args['description']; ?>
	</div>
<?php endif; ?>
<div class="image-popup-wrap block-image-popup">
	<?php if( count($args['images']) > 0 ) : ?>
		<div>
			<?php if( is_array( $args['images'] ) ) : ?>
				<?php foreach( $args['images'] as $key => $image ): ?>
					<div class="slide-wrapper">
						<div class="slide">
							<div class="bg-image" style="background-image: url(<?php echo $image['url']; ?>)"></div>
							
							<?php if( $image['title'] || $image['subtitle'] || $image['description'] ) : // if has text, add text box ?>
								<div class="slide-text">
									<span class="title"><?php echo $image['title']; ?></span>
									<span class="subtitle"><?php echo $image['subtitle']; ?></span>					
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php if($image['popup_content']) : ?>
						<div class="slide-content">
							<?php echo $image['popup_content']; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
