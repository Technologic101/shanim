<?php
    /**
     * string $args[0]['title']
     * string $args[0]['subtitle']
     * string $args[0]['content']
     * string $args[0]['bg_image_url']
     * string $args[0]['overlay_opacity']           // from 0 to 1
     * string $args[0]['overlay_color']             // hex value #010101
     * string $args[0]['column_image_url']
     */
    global $args;
?>
<div class="wow animated fadeInUp">
    <div class="flex-wrap">
        <?php if( isset( $args['bg_image_url'] ) ) : ?>
            <div class="bg-image" style="background-image: url(<?php echo $args['bg_image_url']; ?>);">
            <div class="img-overlay" style="background-color: <?php echo $args['overlay_color']; ?>; opacity: <?php echo $args['overlay_opacity']; ?>;"></div>
            </div>
        <?php else : ?>
            <div class="bg-image">
            <div class="img-overlay" style="background-color: <?php echo $args['overlay_color']; ?>; opacity: <?php echo $args['overlay_opacity']; ?>;"></div>
            </div>
        <?php endif; ?>
           
        <div class="title">
            <div class="title-wrap">
                <?php if( isset( $args['title'] ) ) : ?>
                    <h3><?php echo $args['title']; ?></h3>
                <?php endif; ?>
                <?php if( isset( $args['logo'] ) ) : ?>
                    <img src="<?php echo $args['logo']['url']; ?>">
                <?php endif; ?>
                <span class="subtitle"><?php echo $args['subtitle']; ?></span>
                <div class="content"><?php echo $args['content']; ?></div>
            </div>
        </div>
        <div class="column_image"><img class="col-image" src="<?php echo $args['column_image_url']; ?>"></div>
    </div>
</div>