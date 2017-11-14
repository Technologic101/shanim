<?php

	/*
	 * Global settings for Pilot Theme
	 * The global $pilot object is defined in includes/pilot.class.php
	 *
	 * Are you adding a new function for the theme?
	 *		If you don't know where it should go, put it in includes/pilot-theme-functions.php
	 *
	 *		If it's part of the core of the theme management, place it as a Method in includes/pilot.class.php
	 *
	 **/
		require get_template_directory() . '/includes/pilot.class.php';
		$args = array(
			'sidebar' 					=> 1,		 		// set to 1 to use sidebar
			'comments'					=> 0, 				// set to 1 to use comments
			'default_admin' 			=> 1, 				// set to 0 to remove extraneous meta boxes in admin
			'use_colormaker' 			=> 1,				// set to 1 to use theme-wide color-maker plugin - not yet available
			'add_acf_options_pages' 	=> 1,				// set to 1 to add options pages
			'use_default_page_titles' 	=> 1,				// set to 1 to use default page titles (adds a hide option for indiv pages); 0 to not use default page titles;
			'include_modules' 			=> 1, 				// set to 1 to use modules
			'use_global_modules' 		=> 1,				// set to 1 to use global modules
			'module_classes' 			=> " module ",		// a string of classes that will be added to every module wrapper. i.e., ' wow fadeInUP';
			'use_environments' 			=> 1,	 			// set to 1 to use autodetect of environments
			'environments' 				=> array(
				'development' => array(						// array of development (local) environment urls
					'pilot.dev'
				),
				'staging' => array(							// array of staging (staging server) environment urls
					'pilot.wpengine.com'
				),
				'production' => array(						// array of staging (staging server) environment urls
					'pilot.wpengine.com'
				)
			)
		);
		global $pilot;
		$pilot = new Pilot($args);
		$pilot->build_pilot();						// runs after object is created; checks theme settings and requires conditionally	


		add_filter('deprecated_constructor_trigger_error', '__return_false');