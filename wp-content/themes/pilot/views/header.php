<header id="masthead" class="site-header">
    <div class="top_section">
        <div class="site-branding">
            <h1 class="screen-reader-text">Shani Meyer Zouk and Kizomba in Los Angeles</h1>
            <a href="<?php echo get_site_url(); ?>"><img class="logo" src="<?php echo get_site_url(); ?>/wp-content/themes/pilot/image/SMDC-ONLY-BLACK.png" alt="Shani Mayer Dance Company" title="Shani Meyer Dance Company" ></a>
        </div><!-- .site-branding -->
        <nav id="site-navigation" class="main-navigation">
            <a class="screen-reader-text" href="#content"><?php _e( 'Skip to content', 'pilot' ); ?></a>
            <button id="c-button--push-left" class="c-button menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'pilot' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'c-menu c-menu--push-left' ) ); ?>
        </nav>
    </div>
</header>