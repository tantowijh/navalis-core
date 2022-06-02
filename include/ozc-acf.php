<?php

//Save and Load ACF JSON
define( 'MY_PLUGIN_DIR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // Update path
    $path = WP_PLUGIN_DIR . '/navalis-core' . '/include/acf-json';
    // Return path
    return $path;
    
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
/**
 * Register the path to load the ACF json files so that they are version controlled.
 * @param $paths The default relative path to the folder where ACF saves the files.
 * @return string The new relative path to the folder where we are saving the files.
 */
function my_acf_json_load_point( $paths ) {
   // Remove original path
   unset( $paths[0] );// Append our new path
   $paths[] = plugin_dir_path( __FILE__ ) . '/include/acf-json';   return $paths;
}

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', WP_PLUGIN_DIR . '/navalis-core' . '/include/acf/' );
define( 'MY_ACF_URL', plugin_dir_url( __FILE__ ) . '/include/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return true;
}

?>