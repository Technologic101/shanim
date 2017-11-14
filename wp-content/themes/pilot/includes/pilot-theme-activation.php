<?php

		/* Add Super Admin */
		$admin = get_role('administrator');
		$caps = $admin->capabilities;
		add_role('superadmin', 'Web Dev', $caps);

		/* Activate Plugins */
		$plugins = array(
			'advanced-custom-fields-pro/acf.php',
			'wp-migrate-db-pro/wp-migrate-db-pro.php'
		);
		$active_plugins = get_option('active_plugins');
		require_once(ABSPATH .'/wp-admin/includes/plugin.php');
		foreach( $plugins as $plugin ){
			if (isset($active_plugins[$plugin]))
			    return;
			activate_plugin( $plugin );
		}
		update_option('acf_pro_license', 'YToyOntzOjM6ImtleSI7czo3MjoiYjNKa1pYSmZhV1E5TXpjM05EbDhkSGx3WlQxa1pYWmxiRzl3WlhKOFpHRjBaVDB5TURFMExUQTRMVEU1SURJeE9qSXhPak14IjtzOjM6InVybCI7czoxNjoiaHR0cDovL3BpbG90LmRldiI7fQ==');
?>