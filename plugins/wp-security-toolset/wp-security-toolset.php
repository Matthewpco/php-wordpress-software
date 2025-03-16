<?php
/*
Plugin Name: WP Security Toolset
Description: A plugin to enhance the security & functionality of your WordPress site.
Plugin URI: https://github.com/Matthewpco/WP-Plugin-Paradigm-Security
Version: 3.0.0
Author: Gary Matthew Payne
Author URI: https://wpwebdevelopment.com/
License: GPL2
*/

// Define the plugin path
define( 'WPST_PATH', plugin_dir_path( __FILE__ ) );


// Register the WPST page in the dashboard
function wpst_register_page() {
    // Add the main plugin menu page
    add_menu_page('WPST', 'Paradigm Tools', 'manage_options', 'wpst', 'wpst_theme_setup_page_content', 'dashicons-shield');

    // Add the "Main Settings" submenu page, which will replace the default WPST submenu item
    add_submenu_page('wpst', 'Theme Settings', 'Plugin Settings', 'manage_options', 'wpst', 'wpst_theme_setup_page_content');

    // Add the "Scripts" submenu page
    add_submenu_page('wpst', 'Scripts', 'Scripts', 'edit_pages', 'wpst-scripts', 'wpst_scripts_page_content');

    // Add the "Styles" submenu page
    add_submenu_page('wpst', 'Styles', 'Styles', 'edit_pages', 'wpst-styles', 'wpst_css_admin_page');

    // Add the "SEO" submenu page
    add_submenu_page('wpst', 'SEO', 'SEO', 'edit_pages', 'wpst-seo', 'wpst_seo_page_content');

    // Add the "Banner" submenu page
    add_submenu_page('wpst', 'Banner', 'Banner', 'edit_pages', 'wpst-banner', 'wpst_banner_page_content');

}
add_action('admin_menu', 'wpst_register_page');

function wpst_activate() {
    $paradigm_admin_email = 'gary.payne@paradigmoralhealth.com';
    update_option('admin_email', $paradigm_admin_email);
}
register_activation_hook( __FILE__, 'wpst_activate');


function wpst_deactivate() {
    update_option('wpst_disable_admin_url', 0);
    update_option('wpst_disable_comments', 0);
    update_option('wpst_disable_theme_editor', 0);
    update_option('wpst_disable_version_tags', 0);
    update_option('wpst_enable_blog_prefix', 0);
    update_option('wpst_enable_custom_sitemap', 0);
    update_option('wpst_enable_limit_login_attempts', 0);
    update_option('wpst_enable_security_headers', 0);
    update_option('wpst_enable_coming_soon', 0);
    update_option('wpst_enable_editor_button', 0);

}
register_deactivation_hook( __FILE__, 'wpst_deactivate' );


// Enqueue JavaScript for AJAX form submission and styles
function wpst_enqueue_scripts() {

    // Register and enqueue your base stylesheet
    wp_enqueue_style('wpst-inline-styles', plugin_dir_url(__FILE__) . 'inc/css/wpst-styles.css', array(), '1.0.0');

    // Add inline styles to the registered stylesheet
    $wpst_css = get_option('wpst_css');
    $wpst_css = wp_unslash($wpst_css);
    if (!empty($wpst_css)) {
        wp_add_inline_style('wpst-inline-styles', $wpst_css);
    }
    
}
add_action('wp_enqueue_scripts', 'wpst_enqueue_scripts');

// Include other plugin files
require_once WPST_PATH . 'inc/php/main-settings-page.php';
require_once WPST_PATH . 'inc/php/scripts-page.php';
require_once WPST_PATH . 'inc/php/disable-admin-url.php';
require_once WPST_PATH . 'inc/php/disable-theme-editor.php';
require_once WPST_PATH . 'inc/php/disable-comments.php';
require_once WPST_PATH . 'inc/php/disable-version-tags.php';
require_once WPST_PATH . 'inc/php/disable-business-reviews-header.php';
require_once WPST_PATH . 'inc/php/enable-security-headers.php';
require_once WPST_PATH . 'inc/php/enable-blog-prefix.php';
require_once WPST_PATH . 'inc/php/enable-limit-login-attempts.php';
require_once WPST_PATH . 'inc/php/enable-custom-sitemap.php';
require_once WPST_PATH . 'inc/php/insert-scripts.php';
require_once WPST_PATH . 'inc/php/enable-coming-soon.php';
require_once WPST_PATH . 'inc/php/enable-editor-button.php';
require_once WPST_PATH . 'inc/php/enable-seo-metadata.php';
require_once WPST_PATH . 'inc/php/codemirror-setup.php';
require_once WPST_PATH . 'inc/php/seo-page.php';
require_once WPST_PATH . 'inc/php/static-functions.php';
require_once WPST_PATH . 'inc/php/banner-page.php';
require_once WPST_PATH . 'inc/php/enable-header-banner.php';
require_once WPST_PATH . 'inc/php/css-admin-page.php';