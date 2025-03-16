<?php
/*
Plugin Name: POH DI B Landing Page Plugin
Description: A plugin to add a landing page style B for Dental Implants.
Plugin URI: https://github.com/Paradigm-Oral-Health/landing-page
Version: 1.9.0
Author: Joseph Isaac Shown, David Rosen
Author URI: https://wpwebdevelopment.com/
License: GPL2
*/

// Check if WordPress is running
if (!defined('ABSPATH')) {
    exit;
}

// Define the plugin path
define( 'POH_DI_B_LPP_PATH', plugin_dir_path( __FILE__ ) );

// Register the POH-Landing page in the dashboard
add_action('admin_menu', 'poh_di_b_lpp_register_page');

function poh_di_b_lpp_register_page() {
    // Add the plugin menu page
    add_menu_page('DI B Landing Page', 'DI B Landing Page', 'manage_options', 'poh-di-b-lpp-landing-page', 'poh_di_b_lpp_admin_page_content', 'dashicons-admin-home');

    // Add the "Landing Page Settings" submenu page
    add_submenu_page('poh-di-b-lpp-landing-page', 'Landing Page Settings', 'Settings', 'manage_options', 'poh-di-b-lpp-landing-page', 'poh_di_b_lpp_admin_page_content');

    // Add the "Landing Page Content" submenu page
    add_submenu_page('poh-di-b-lpp-landing-page', 'Landing Page Content', 'Content', 'edit_pages', 'poh-di-b-lpp-landing-page-content', 'poh_di_b_lpp_content_page_content');
}

function poh_di_b_lpp_activate() {
    poh_di_b_lpp_add_rewrite_rule();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'poh_di_b_lpp_activate');

function poh_di_b_lpp_deactivate() {
    update_option('poh-di-b-lpp-enable-landing-page', 0);
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'poh_di_b_lpp_deactivate' );

function poh_di_b_lpp_add_rewrite_rule() {
    // Get the custom slug from the WordPress options
    $custom_slug = get_option('poh-di-b-lpp-landing-page-slug', 'landing-page'); // Default to 'landing-page' if not set

    // Add the rewrite rule using the custom slug
    add_rewrite_rule( $custom_slug, 'index.php?poh_di_b_lpp_landing_page=1', 'top');
    flush_rewrite_rules();
}
add_action('init', 'poh_di_b_lpp_add_rewrite_rule', 10, 0);


function poh_di_b_lpp_register_query_var( $vars ) {
    $vars[] = 'poh_di_b_lpp_landing_page';
    return $vars;
}
add_filter( 'query_vars', 'poh_di_b_lpp_register_query_var' );

function poh_di_b_lpp_deregister_styles() {
    // Check if it's the landing page
    if(get_query_var('poh_di_b_lpp_landing_page')) {
        // Define the styles to keep
        $styles_to_keep = array(
            'structure-style', 'poh-doctor-switcher-cards-stylesheet', 'wpst-inline-styles', 
            'wp-block-library', 'poh-di-b-lpp-main-style', 'fontawesome-style', 'admin-bar', 
            'classic-theme-styles', 'global-styles', 'paradigm-forms-inline', 'paradigm-forms-styles', 
            'brb-public-main-css', 'poh-quiz-form-a-styles', 'poh-quiz-form-b-styles'
        );
        global $wp_styles;
        foreach ($wp_styles->queue as $handle) {
            if (!in_array($handle, $styles_to_keep)) {
                wp_dequeue_style($handle);
            }
        }
    }
}
add_action('wp_print_styles', 'poh_di_b_lpp_deregister_styles', 1);

function poh_di_b_lpp_enqueue_styles() {
    if(get_query_var('poh_di_b_lpp_landing_page')) {
        // Enqueue the stylesheets directly
        wp_enqueue_style('structure-style', plugin_dir_url(__FILE__) . 'inc/css/structure.css');
        wp_enqueue_style('poh-di-b-lpp-main-style', plugin_dir_url(__FILE__) . 'inc/css/style.css');
        wp_enqueue_style('fontawesome-style', plugin_dir_url(__FILE__) . 'inc/fonts/all.css');
        wp_enqueue_script('dental-implants-hover', plugin_dir_url(__FILE__) . 'inc/js/dental-implants-hover.js');
        wp_enqueue_script('poh-di-b-lpp-mobile-menu-toggle', plugin_dir_url(__FILE__) . 'inc/js/mobile-menu-toggle.js');
    }
}
add_action('wp_enqueue_scripts', 'poh_di_b_lpp_enqueue_styles');


function poh_di_b_lpp_admin_enqueue_scripts() {

    // Enqueue the scripts for admin pages
    wp_enqueue_script('admin-scripts', plugin_dir_url(__FILE__) . 'inc/js/admin-scripts.js');

}
add_action('admin_enqueue_scripts', 'poh_di_b_lpp_admin_enqueue_scripts');

// Filter to remove Yoast SEO overrides of meta tags and canonical url from <head> on POH DI Landing Page
add_filter('wpseo_frontend_presenters', function($presenters) {
    // Check if it's the landing page
    if(get_query_var('poh_di_b_lpp_landing_page')) {
        return [];
    }
    return $presenters;
});


// Include other plugin files
require_once POH_DI_B_LPP_PATH . 'inc/php/admin-page.php';
require_once POH_DI_B_LPP_PATH . 'inc/php/content-page.php';
require_once POH_DI_B_LPP_PATH . 'inc/php/enable-landing-page.php';
require_once POH_DI_B_LPP_PATH . 'inc/php/enable-landing-page-url.php';