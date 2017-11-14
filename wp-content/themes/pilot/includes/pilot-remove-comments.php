<?php

/* 
 * REMOVES COMMENTS IF GLOBAL $pilot->comments == 0 
 **/

	function pilot_remove_admin_menus() {
	    remove_menu_page( 'edit-comments.php' );
	}
	function pilot_remove_comment_support() {
	    remove_post_type_support( 'post', 'comments' );
	    remove_post_type_support( 'page', 'comments' );
	}
	function pilot_admin_bar_render() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('comments');
	}
	add_action( 'admin_menu', 'pilot_remove_admin_menus' );
	add_action('init', 'pilot_remove_comment_support', 100);
	add_action( 'wp_before_admin_bar_render', 'pilot_admin_bar_render' );
?>