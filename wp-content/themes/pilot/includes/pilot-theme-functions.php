<?php
	function pilot_get_title(){
		if (is_home()) {
			if (get_option('page_for_posts', true)) {
				return get_the_title(get_option('page_for_posts', true));
			}
			else {
				return __('Latest Posts', 'dorado');
			}
		} elseif (is_archive()) {
			return get_the_archive_title();
		}
		elseif (is_search()) {
			return sprintf(__('Search Results for %s', 'dorado'), get_search_query());
		}
		elseif (is_404()) {
			return __('Not Found', 'dorado');
		}
		else {
			return get_the_title();
		}
	}
	function pilot_get_view_format(){
		return;
	}
	function pilot_get_sidebar(){
		global $pilot;
		if( $pilot->sidebar ){
			get_sidebar();
		}
	}
	function pilot_get_comments(){
		global $pilot;
		if( $pilot->comments ){
			if ( comments_open() || get_comments_number() ){
				comments_template();
			}			
		}
	}
	function acf_load_cdn_field_choices( $field ) {
	    $field['choices'] = array();
		$type = get_field('theme_type', 'option');
		$gender = get_field('theme_gender', 'option');
		$url = 'http://fitmaster.wpengine.com/wp-json/wp/v2/media?filter[media_category]='.$type.'%2B'.$gender;
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$output = curl_exec($ch); 
		$media = json_decode($output);
		foreach( $media as $media ){
			$url = $media->source_url;
			$field['choices'][$url] = "<img width='100px' src='".$url."'>";
		}
		curl_close($ch);    
		return $field;   
	}
	add_filter('acf/load_field/name=cdn_image', 'acf_load_cdn_field_choices');
	
	function asset_path($filename) {
		$dist_path = get_template_directory_uri() . DIST_DIR;
		$directory = dirname($filename) . '/';
		$file = basename($filename);
		static $manifest;
		
		if (empty($manifest)) {
			$manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
			$manifest = new JsonManifest($manifest_path);
		}
		if (array_key_exists($file, $manifest->get())) {
			return $dist_path . $directory . $manifest->get().array($file);
		} else {
			return $dist_path . $directory . $file;
		}
	}

	// Custom styling for Login Page

	function login_styles() {
	?>
		<style type="text/css"> 
			body.login div#login h1 a {
				background-image: url( <?php echo site_url(); ?>/wp-content/themes/pilot/image/Logo.svg);
				background-size: 140px auto;
				width: 140px;
			}
		</style>
	<?php
	} 
	add_action( 'login_enqueue_scripts', 'login_styles' );
?>