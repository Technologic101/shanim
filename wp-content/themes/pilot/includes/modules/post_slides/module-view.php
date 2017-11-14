<?php
	/**
	 * string	$args['title']
	 * array	$args['posts']			 //  array of rows of lede/content
	 * string	$args['posts'][0]['image'] // thumbnail url 
	 * string	$args['posts'][0]['post_title'] //  post title
	 * string	$args['posts'][0]['content'] //  row hidden content
	 */
	global $args;
?>
<h3><?php echo $args['title']; ?></h3>
<div class="wrapper">
<?php if( is_array($args['posts']) ) : ?>	
	<?php foreach ($args['posts'] as $idx => $arg) : ?>
	
	    <div class="slide">
	        <div class="slide-inner">
	            <img class="slide-image" src="<?php echo $arg['image']; ?>"/>
	            <div class="slide-info">
	                <h4 class="title"><?php echo $arg['post_title'] ?></h4>
	                <div class="content">
	                    <?php echo $arg['content'] ?>
	                </div>
	                <?php if ($arg['permalink']) : ?>
	                    <div class="slide-link">
	                        <a href="<?php echo $arg['permalink']; ?>">Link</a>
	                    </div>
	                <?php endif; ?>
	            </div>
	        </div>
	    </div>
	
	<?php endforeach; ?>
<?php endif; ?>
</div>