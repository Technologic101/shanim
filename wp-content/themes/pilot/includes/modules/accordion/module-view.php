<?php 
	/**
	 * string	$args['title']
	 * string	$args['content']
	 * array	$args['rows']			 //  array of rows of lede/content
	 * string	$args['rows'][0]['lede'] //  row title
	 * string	$args['rows'][0]['hidden_content'] //  row hidden content
	 */
	global $args; 
?>
<?php if( $args['content'] || (is_array($args['rows']) && count($args['rows']) > 0 )) : ?>
	<?php if( $args['title'] ) : ?>
		<h3 class="wow fadeInUp"><?php echo $args['title']; ?></h3>
	<?php endif; ?>
	<div class="accordion-wrapper wow fadeInUp">
		<?php if( $args['content'] ) : ?>
			<div class="accordion-content">
				<?php echo $args['content']; ?>
			</div>
		<?php endif; ?>
		<?php if( count($args['rows']) > 0 ) : ?>
			<dl class="accordion">
			<?php if( is_array( $args['rows'] ) ) : ?>
				<?php foreach( $args['rows'] as $row ): ?>
						<dt>
							<a href="#0">
								<?php echo $row['lede']; ?>
								<?php if ($row['hidden_content']) : ?>
									<svg class="acc-minus" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
										<rect x="4.5" transform="matrix(4.486793e-11 1 -1 4.486793e-11 12 -2.692078e-10)" width="3" height="12"/>
									</svg>
									<svg class="acc-plus" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve">
										<rect x="4.5" width="3" height="12"/>
										<rect x="4.5" transform="matrix(4.486793e-11 1 -1 4.486793e-11 12 -2.692078e-10)" width="3" height="12"/>
									</svg>
								<?php endif; ?>
							</a>
						</dt>
						<dd><?php echo $row['hidden_content']; ?></dd>
				<?php endforeach; ?>
			<?php endif; ?>
			</dl>
		<?php endif; ?>
	</div>
<?php endif; ?>