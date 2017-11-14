<?php
	/**
	 * string	$args['title']
	 * array	$args['columns']			 //  array of rows of lede/content
	 * string	$args['columns'][0]['image'] // 
	 * string	$args['columns'][0]['column_title'] //  row hidden content
	 * string	$args['columns'][0]['content'] //  row hidden content
	 */
	global $args;
?>
<h3><?php echo $args['title']; ?></h3>
<div class="wrapper">
<?php if( is_array($args['columns']) ) : ?>	
	<?php foreach ($args['columns'] as $idx => $arg) : ?>
	
	    <div class="slide">
	        <div class="slide-inner">
	            <img class="slide-image" src="<?php echo $arg['image']['url'] ?>"/>
	            <div class="slide-info">
	                <h4 class="title"><?php echo $arg['column_title'] ?></h4>
	                <div class="content">
	                    <?php echo $arg['content'] ?>
	                </div>
	                <?php if ($arg['column_link']) : ?>
	                    <div class="slide-link">
	                        <a href="<?php echo get_permalink($arg['column_link']->ID); ?>">Link</a>
	                    </div>
	                <?php endif; ?>
	            </div>
	        </div>
	    </div>
	
	<?php endforeach; ?>
<?php endif; ?>
</div>