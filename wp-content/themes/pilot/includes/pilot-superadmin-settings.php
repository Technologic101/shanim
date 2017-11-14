<?php

/* ACF is hidden by Default in pilot-theme-setup.php (turn on for superadmin) */
if( is_admin() ){
	add_filter('acf/settings/show_admin', function(){ return true; });
}
?>