<?php
	/**
	 * string	$args['rows']
	 * string	$args['rows'][0]['image']
	 * string	$args['rows'][0]['title']
	 * string	$args['rows'][0]['text']
	 * string	$args['rows'][0]['button_text']
	 * string	$args['rows'][0]['button_link']
	 */
	global $args;
?>
<?php if(is_array($args['rows'])): $row_counter = 0; ?>
	<?php foreach( $args['rows'] as $row ) : ?>
			<?php 
				$image_content = "<div class='alt-block-image' style='background-image: url(".$row['image']['url'].")'></div>";
				$text_content = "
					<div class='alt-content-section wow animated fadeInUp'>
						<div class='innersection'>
							<h2>".$row['title']."</h2>
							<div class='line'></div>
							<div class='text'>".$row['text']."</div>
							<a href='".$row['button_link']."'>
								<div class='pilot-button'>".$row['button_text']."</div>
							</a>
						</div><!--innersection--->
					</div><!--alt-content-section--->";
			?>
			<div class="alternating-section wow animated fadeInUp">
				<?php if( $row_counter%2 ) : ?>
					<?php echo $image_content.$text_content; ?>	
				<?php else: ?>
					<?php echo $text_content.$image_content; ?>	
				<?php endif; $row_counter++; ?>
		  </div><!--/alternating-section--->
			<div class="clear"></div>  

	<?php endforeach; ?>

<?php endif; ?>