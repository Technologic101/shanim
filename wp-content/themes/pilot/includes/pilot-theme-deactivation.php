<?php
	/* Role Cleanup */
	global $wpdb;
	$query = "SELECT * FROM $wpdb->users WHERE ID = ANY (SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'wp_capabilities' AND meta_value RLIKE 'superadmin') ORDER BY user_nicename ASC LIMIT 10000";
	$users = $wpdb->get_results($query);
	foreach( $users as $user ){
		$u = new WP_User( $user->ID );
		$u->remove_role( 'superadmin' );
		$u->add_role( 'administrator' );	
	}
?>