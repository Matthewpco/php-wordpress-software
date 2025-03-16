<?php
add_action( 'wp_enqueue_scripts', 'paradigm_theme_child_enqueue_styles' );
function paradigm_theme_child_enqueue_styles() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/inc/css/normalize.css');
    wp_enqueue_style('navigation-styles', get_template_directory_uri() . '/inc/css/navigation.css', array(), filemtime(get_template_directory() . '/inc/css/navigation.css'));
    wp_enqueue_style( 'paradigm-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'paradigm-style' ),
        wp_get_theme()->get('Version')
    );
    //wp_enqueue_style('additional-styles', get_stylesheet_directory_uri() . '/inc/css/additional-styles.css');
}

// Include configuration files
//include get_stylesheet_directory() . '/inc/php/example.php';

// Redirects EXAMPLE URLS BELOW
function custom_redirects() {
	// Get the current URL
	$current_url = home_url(add_query_arg(NULL, NULL));
	// Define your redirects
	$redirects = array(
		home_url('/virginia-oral-surgery-contact/') => 'https://www.virginiaoralimplantsurgery.com/contact/',
	);
	// Check if the current URL is in the redirects array
	if (array_key_exists($current_url, $redirects)) {
		 // If it is, redirect to the corresponding URL
		 wp_redirect($redirects[$current_url], 301);
		 exit;
	}
}
// Hook into 'template_redirect'
//add_action('template_redirect', 'custom_redirects');