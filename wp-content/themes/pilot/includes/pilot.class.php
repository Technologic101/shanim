<?php
class Pilot{
	public function __construct( $args = array() ){

	    $defaults = array(
			'sidebar' => 0,		 				// sidebar off
			'comments' => 0, 					// comments off
			'default_admin' => 1, 				// extraneous meta boxes turned on
			'use_colormaker' => 1,				// colormaker turned on
			'add_acf_options_pages' => 1,		// options pages (theme settings, etc) turned on
			'use_default_page_titles' => 1,		// default page titles (adds a hide option for indiv pages) turned on
			'use_environments' => 1		 		// autodetection of environments turned on
	    );
		$params = array_replace_recursive($defaults, $args);

		if( is_array( $params ) ){
			foreach( $params as $key => $value ){
				$this->$key = $value;
			}
		}

		/* Automatic settings. */
		$this->contact_map_count = 0; 	// will be incremented for map ids for contact maps

		/*
		 * Conditionally set Pilot Parameters
		 **/

		// Define environment
		if( $this->use_environments ){
			$hostname = null;
			if (isset($_SERVER['HTTP_X_FORWARDED_HOST']) && !empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
			    $hostname = $_SERVER['HTTP_X_FORWARDED_HOST'];
			}
			elseif (isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])) {
				$hostname = $_SERVER['HTTP_HOST'];
			}
			if( $hostname && array_key_exists( 'development' , $this->environments) && in_array( $hostname, $this->environments['development'] ) ){
				define('WP_ENV', 'development');
			}
			elseif( $hostname && array_key_exists( 'staging' , $this->environments) && in_array( $hostname, $this->environments['staging'] ) ){
				define('WP_ENV', 'staging');
			}
			else{
				define('WP_ENV', 'production');
			}
		}

		// user role is checked and set later for web dev role (set to '1' to override if not using web dev role)  
	    $user = wp_get_current_user();
		$this->is_superadmin = 0;		
		if ( in_array( 'superadmin', (array) $user->roles ) ) {
			$this->is_superadmin = true;
		}
	}
	function build_pilot(){
		/*
		 * Requires
		 **/
		require get_template_directory() . '/includes/pilot-theme-setup.php';
		require get_template_directory() . '/includes/pilot-enqueue.php';
		require get_template_directory() . '/includes/pilot-theme-functions.php';
		require get_template_directory() . '/includes/template-tags.php';
		require get_template_directory() . '/includes/customizer.php';
		require get_template_directory() . '/includes/login-style.php';
		$this->conditional_requires();
		$this->get_custom_post_types(); 	// automatically pulls in cpts from /includes/post_types 
	}
	function get_custom_post_types(){
		if( !property_exists($this, 'post_types') ){
			$current_directory = __FILE__;
			$root = preg_replace( '#includes(.*?)pilot.class.php#', '', $current_directory);
			$path = $root . "/includes/post_types";
			$dirs = glob($path . '/*' , GLOB_ONLYDIR);
			$post_types = array();
			foreach( $dirs as $dir ){
				$pos = strrpos($dir, '/') + 1;
				$post_type = substr($dir,$pos);
				$post_types[] = $post_type;
				require get_template_directory() . '/includes/post_types/'.$post_type.'/cpt-functions.php';
			}
			$this->post_types = $post_types;
		}
	}
	function conditional_requires(){
		if( !$this->comments ){
			require get_template_directory() . '/includes/pilot-remove-comments.php';
		}
		if(	$this->default_admin ){
			require get_template_directory() . '/includes/pilot-admin-cleanup.php';
		}
		if( $this->add_acf_options_pages ){
			require get_template_directory() . '/includes/pilot-acf-options-pages.php';
		}
	
		// ensure at least one module is included above and acf is active
		if(	$this->include_modules && function_exists('acf_add_local_field_group') ){ 
			require get_template_directory() . '/includes/modules/modules.php';
		}
		if( $this->is_superadmin ){
			require get_template_directory() . '/includes/pilot-superadmin-settings.php';
		}
		if( $this->use_default_page_titles ){
			require get_template_directory() . '/includes/pilot-acf-title-override.php';
		}
		if( $this->use_colormaker && function_exists('acf_add_local_field_group') ){
			require get_template_directory() . '/includes/colormaker/colormaker.php';
		}
	}
}
?>