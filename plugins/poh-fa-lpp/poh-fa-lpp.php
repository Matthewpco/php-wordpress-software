<?php
/*
Plugin Name: POH FA Landing Page Plugin
Description: A plugin to add a landing page for Full Arch aka All on 4.
Plugin URI: https://github.com/Paradigm-Oral-Health/
Version: 1.0.0
Author: Gary Matthew Payne
Author URI: https://wpwebdevelopment.com/
License: GPL2
*/

// Check if WordPress is running
if (!defined('ABSPATH')) {
    exit;
}

// Define the plugin path
define( 'POH_FA_LPP_PATH', plugin_dir_path( __FILE__ ) );

// Register the POH-Landing page in the dashboard
add_action('admin_menu', 'poh_fa_lpp_register_page');

function poh_fa_lpp_register_page() {
    // Add the plugin menu page
    add_menu_page('FA Landing Page', 'FA Landing Page', 'manage_options', 'poh-fa-lpp-landing-page', 'poh_fa_lpp_admin_page_content', 'dashicons-admin-home');

    // Add the "Landing Page Settings" submenu page
    add_submenu_page('poh-fa-lpp-landing-page', 'Landing Page Settings', 'Settings', 'manage_options', 'poh-fa-lpp-landing-page', 'poh_fa_lpp_admin_page_content');

    // Add the "Landing Page Content" submenu page
    add_submenu_page('poh-fa-lpp-landing-page', 'Landing Page Content', 'Content', 'edit_pages', 'poh-fa-lpp-landing-page-content', 'poh_fa_lpp_content_page_content');
}

function poh_fa_lpp_activate() {
    poh_fa_lpp_add_rewrite_rule();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'poh_fa_lpp_activate');

function poh_fa_lpp_deactivate() {
    update_option('poh-fa-lpp-enable-landing-page', 0);
    flush_rewrite_rules();

}
register_deactivation_hook( __FILE__, 'poh_fa_lpp_deactivate' );

function poh_fa_lpp_add_rewrite_rule() {
    // Get the custom slug from the WordPress options
    $custom_slug = get_option('poh-fa-lpp-landing-page-slug', 'landing-page'); // Default to 'landing-page' if not set

    // Add the rewrite rule using the custom slug
    add_rewrite_rule( $custom_slug, 'index.php?poh_fa_lpp_landing_page=1', 'top');
    flush_rewrite_rules();
}
add_action('init', 'poh_fa_lpp_add_rewrite_rule', 10, 0);


function poh_fa_lpp_register_query_var( $vars ) {
    $vars[] = 'poh_fa_lpp_landing_page';
    return $vars;
}
add_filter( 'query_vars', 'poh_fa_lpp_register_query_var' );

function poh_fa_lpp_deregister_styles() {
    // Check if it's the landing page
    if(get_query_var('poh_fa_lpp_landing_page')) {
        global $wp_styles;
        $styles_to_keep = array('structure-style', 'poh-fa-lpp-ext-styles', 'wp-block-library', 'poh-fa-lpp-main-style', 'fontawesome-style', 'poh-fa-lpp-forms-style', 'admin-bar', 'classic-theme-styles', 'global-styles', 'paradigm-forms-inline', 'paradigm-forms-styles'); // Add the handles of your styles here
        foreach( $wp_styles->queue as $handle ) :
            // Skip dequeuing your styles
            if (!in_array($handle, $styles_to_keep)) {
                wp_dequeue_style( $handle );
            }
        endforeach;
    }
}
add_action('wp_print_styles', 'poh_fa_lpp_deregister_styles', 1);

function poh_fa_lpp_enqueue_styles() {
    if(get_query_var('poh_fa_lpp_landing_page')) {
        // Enqueue the stylesheets directly
        wp_enqueue_style('structure-style', plugin_dir_url(__FILE__) . 'inc/css/structure.css');
        wp_enqueue_style('poh-fa-lpp-main-style', plugin_dir_url(__FILE__) . 'inc/css/style.css');
        wp_enqueue_style('fontawesome-style', plugin_dir_url(__FILE__) . 'inc/fonts/all.css');
        wp_enqueue_style('poh-fa-lpp-forms-style', plugin_dir_url(__FILE__) . 'inc/css/forms-styles.css');
        wp_enqueue_script('lightbox', plugin_dir_url(__FILE__) . 'inc/js/lightbox.js');
        wp_enqueue_script('mobile-form', plugin_dir_url(__FILE__) . 'inc/js/mobile-form.js');
        wp_enqueue_script('fixed-button', plugin_dir_url(__FILE__) . 'inc/js/fixed-button.js');

    }
}
add_action('wp_enqueue_scripts', 'poh_fa_lpp_enqueue_styles');


function poh_fa_lpp_admin_enqueue_scripts() {

    // Enqueue the scripts for admin pages
    wp_enqueue_script('admin-scripts', plugin_dir_url(__FILE__) . 'inc/js/admin-scripts.js');

}
add_action('admin_enqueue_scripts', 'poh_fa_lpp_admin_enqueue_scripts');

// Filter to remove Yoast SEO overrides of meta tags and canonical url from <head> on POH DI Landing Page
add_filter('wpseo_frontend_presenters', function($presenters) {
    // Check if it's the landing page
    if(get_query_var('poh_fa_lpp_landing_page')) {
        return [];
    }
    return $presenters;
});


// Include other plugin files
require_once POH_FA_LPP_PATH . 'inc/php/admin-page.php';
require_once POH_FA_LPP_PATH . 'inc/php/content-page.php';
require_once POH_FA_LPP_PATH . 'inc/php/enable-landing-page.php';
require_once POH_FA_LPP_PATH . 'inc/php/enable-landing-page-url.php';