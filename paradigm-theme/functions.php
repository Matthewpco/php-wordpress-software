<?php 
// Get the current site URL
$current_server_url = get_site_url();

// Define the value
define('CURRENT_SERVER_URL', $current_server_url);

// Include configuration files
include get_template_directory() . '/inc/php/theme-config.php';
include get_template_directory() . '/inc/php/csp.php';


// Enqueue scripts and styles
function paradigm_enqueue_styles() {
	wp_enqueue_style('normalize', get_template_directory_uri() . '/inc/css/normalize.css');
    wp_enqueue_style('navigation-styles', get_template_directory_uri() . '/inc/css/navigation.css', array(), filemtime(get_template_directory() . '/inc/css/navigation.css'));
    wp_enqueue_style('paradigm-style', get_stylesheet_uri());
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/all.css', array(), '6.4.0' );
    wp_enqueue_script( 'mobile-menu-toggle', get_template_directory_uri() . '/inc/js/mobile-menu-toggle.js', array(), '1.0.0', true );
    wp_enqueue_script( 'accessible-navigation', get_template_directory_uri() . '/inc/js/accessible-navigation.js', array(), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'paradigm_enqueue_styles');
