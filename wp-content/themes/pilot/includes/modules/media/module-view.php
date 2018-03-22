<?php
	/**
	 * $args = array() 								// array of media blocks - if count($args) == 2 is a double;
	 * IF IS IMAGE :
	 * 		string $args[0]['image_url']
	 * IF IS VIDEO BY FILE UPLOAD 	// not yet available
	 * 		string $args[0]['video_file_mp4']		// url to local directory
	 * AVAILABLE TO ALL MEDIA TYPES:
	 * string $args[0]['id']
	 * string $args[0]['width']						// get_block() sets class on wrapper div: full_width, half_width_center (half width, one per row), half_width_float (half_width_float: user is responsible for adding appropriate number of blocks)
	 * string $args[0]['overlay_opacity']			// from 0 to 1
	 * string $args[0]['overlay_color']				// hex value #010101
	 *
	 * IF USES TITLE
	 * 		string $args[0]['title']
	 * ELSE IF USES LOGO
	 * 		string $args[0]['logo']
	 *
	 * string $args[0]['subtitle']
	 * string $args[0]['button_href'] (optional)
	 * string $args[0]['button_text'] (optional)
	 */
	global $args;	
?>
<?php foreach ( $args as $arg ) : ?>
	<div class="img-block-wrap <?php echo $arg['width_class']; ?>" id="<?php echo $arg['id']; ?>">

		<?php if( isset( $arg['image_url'] )) : ?>
			<div class="bg-image" style="background-image: url(<?php echo $arg['image_url']; ?>);">
				<div class="img-overlay" style="background-color: <?php echo $arg['overlay_color']; ?>; opacity: <?php echo $arg['overlay_opacity']; ?>;"></div>
					<div class="title">
        		<div class="title-wrap">
							<section class="wow fadeInUp animated" data-wow-duration="1s">
								<?php if( isset( $arg['title'] ) ) : ?>
									<h2><?php echo $arg['title']; ?></h2>
								<?php endif; ?>

                <?php if( isset( $arg['subtitle'] ) ) : ?>
									<span class="subtitle"><?php echo $arg['subtitle']; ?></span>
								<?php endif; ?>
								
								<?php if( isset( $arg['logo'] ) ) : ?>
									<img src="<?php echo $arg['logo']['url']; ?>">
								<?php endif; ?>
								
								<?php if( $arg['button_href'] ) : ?>
									<a href="<?php echo $arg['button_href']; ?>">
										<?php echo $arg['button_text']; ?>
									</a>
								<?php endif; ?>
							</section>
						</div>
					</div>           
	      </div>
            
		<?php endif; ?>
        
		<?php if( isset( $arg['video_file_mp4'] ) ) : ?>
	    <div class="bg-image">
	      <div class="video"
	                 data-vide-options="posterType: <?php echo substr($arg['fallback_image_url'],-3) ?>"
	                 data-vide-bg="mp4: <?php echo $arg['video_file_mp4']; ?>,poster: <?php echo $arg['fallback_image_url']; ?>"
	            >
	      </div>
			<div class="title">
				<div class="title-wrap">
					<section class="wow fadeInUp animated" data-wow-duration="1s">
						<span class="subtitle"><?php echo $arg['subtitle']; ?></span>
						<?php if( isset( $arg['title'] ) ) : ?>
							<div class="text_effect">
								<div class="effect">
									<span data-letters="<?php echo $arg['title']; ?>"><?php echo $arg['title']; ?></span>
								</div>
							</div>
						<?php endif; ?>
						<?php if( isset( $arg['logo'] ) ) : ?>
							<img src="<?php echo $arg['logo']['url']; ?>">
						<?php endif; ?>
						<?php if( $arg['button_href'] ) : ?>
							<a href="<?php echo $arg['button_href']; ?>">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
									<path d="M20,0C9,0,0,9,0,20s9,20,20,20c11,0,20-9,20-20S31,0,20,0z M15.4,30V10l13.3,10L15.4,30z"/>
								</svg>
								<?php echo $arg['button_text']; ?>
							</a>
						<?php endif; ?>
					</section>
				</div>
			</div>           

	        <div class="img-overlay" style="background-color: <?php echo $arg['overlay_color']; ?>; opacity: <?php echo $arg['overlay_opacity']; ?>;"></div>
	    </div>
		<?php endif; ?>
	</div>
<?php endforeach; ?>