<?php
/*
Plugin Name: All on 4 POH LP
Description: A plugin to add a landing page based on various conditions.
Plugin URI: https://github.com/Paradigm-Oral-Health/landing-page
Version: 2.0.0
Author: Gary Matthew Payne
Author URI: https://wpwebdevelopment.com/
License: GPL2
*/

// Check if WordPress is running
if (!defined('ABSPATH')) {
    exit;
}

// Define the plugin path
define( 'POHLP_PATH', plugin_dir_path( __FILE__ ) );


// Register the POH-Landing page in the dashboard
add_action('admin_menu', 'pohlp_register_page');

function pohlp_register_page() {
    // Add the plugin menu page
    add_menu_page('Landing Page', 'Landing Page', 'manage_options', 'poh-landing-page', 'admin_page_content', 'dashicons-admin-home');

    // Add the "Landing Page Settings" submenu page
    add_submenu_page('poh-landing-page', 'Landing Page Settings', 'Settings', 'manage_options', 'poh-landing-page', 'admin_page_content');

    // Add the "Landing Page Content" submenu page
    add_submenu_page('poh-landing-page', 'Landing Page Content', 'Content', 'edit_pages', 'landing-page-content', 'content_page_content');
}

function my_plugin_activate() {
    my_plugin_add_rewrite_rule();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'my_plugin_activate');

function pohlp_deactivate() {
    update_option('pohlp-enable-landing-page', 0);
    flush_rewrite_rules();

}
register_deactivation_hook( __FILE__, 'pohlp_deactivate' );

function my_plugin_add_rewrite_rule() {
    // Get the custom slug from the WordPress options
    $custom_slug = get_option('pohlp-landing-page-slug', 'landing-page'); // Default to 'landing-page' if not set

    // Add the rewrite rule using the custom slug
    add_rewrite_rule( $custom_slug, 'index.php?landing_page=1', 'top');
    flush_rewrite_rules();
}
add_action('init', 'my_plugin_add_rewrite_rule', 10, 0);


function my_plugin_register_query_var( $vars ) {
    $vars[] = 'landing_page';
    return $vars;
}
add_filter( 'query_vars', 'my_plugin_register_query_var' );

function enqueue_pohlp_styles() {
    if(get_query_var('landing_page')) {
        // Enqueue the stylesheets directly
        wp_enqueue_style('structure-style', plugin_dir_url(__FILE__) . 'inc/css/structure.css');
        wp_enqueue_style('pohlp-main-style', plugin_dir_url(__FILE__) . 'inc/css/style.css');
        wp_enqueue_style('fontawesome-style', plugin_dir_url(__FILE__) . 'inc/fonts/all.css');
        wp_enqueue_style('pohlp-forms-style', plugin_dir_url(__FILE__) . 'inc/css/forms-styles.css');
        wp_enqueue_script('lightbox', plugin_dir_url(__FILE__) . 'inc/js/lightbox.js');
        wp_enqueue_script('mobile-form', plugin_dir_url(__FILE__) . 'inc/js/mobile-form.js');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_pohlp_styles');


function deregister_pohlp_styles() {
    // Deregister the stylesheets
    if(get_query_var('landing_page')) {
        wp_deregister_style('wp-block-library');
        wp_deregister_style('twenty-twenty-one-style');
        wp_deregister_style('twenty-twenty-one-print-style');
        wp_deregister_style('twenty-twenty-one-custom-color-overrides');
    }
}
 add_action('wp_enqueue_scripts', 'deregister_pohlp_styles', 100);


// Include other plugin files
require_once POHLP_PATH . 'inc/php/admin-page.php';
require_once POHLP_PATH . 'inc/php/content-page.php';
require_once POHLP_PATH . 'inc/php/enable-landing-page.php';
require_once POHLP_PATH . 'inc/php/enable-landing-page-url.php';