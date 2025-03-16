<?php
/*
Plugin Name: POH Doctor Switcher
Description: Creates a shortcode for a doctor switcher component
Plugin URI: https://github.com/Paradigm-Oral-Health/Paradigm-Theme
Version: 1.3.0
Author: David Rosen
Author URI: https://github.com/DavidRSoftware
License: GPL2
*/

// Check if WordPress is running
if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . '/php/admin-page.php';
require_once plugin_dir_path(__FILE__) . '/php/content-page.php';
require_once plugin_dir_path(__FILE__) . '/php/landing-page-a-content-page.php';
require_once plugin_dir_path(__FILE__) . '/php/dr-switcher-shortcode.php';
require_once plugin_dir_path(__FILE__) . '/php/landing-page-a-dr-switcher-shortcode.php';

function poh_doctor_switcher_admin_menu() {

    add_menu_page(
        'Doctor Switcher Plugin', // Page title
        'Doctor Switcher',        // Menu title
        'edit_pages',             // Capability
        'poh-doctor-switcher-admin', // Menu slug
        'poh_doctor_switcher_admin_page' // Function to display options
    );

    // Add submenu page for options
    add_submenu_page(
        'poh-doctor-switcher-admin', // Parent slug
        'Doctor Switcher',             // Page title
        'Doctor Switcher',             // Menu title
        'edit_pages',                  // Capability
        'poh-doctor-switcher-admin', // Menu slug
        'poh_doctor_switcher_admin_page' // Function to display options
    );

    // Add submenu page for content
    add_submenu_page(
        'poh-doctor-switcher-admin',    // Parent slug
        'Content Page',                 // Page title
        'Content',                      // Menu title
        'edit_pages',                   // Capability
        'poh-doctor-switcher-content',  // Menu slug
        'poh_doctor_switcher_content_page' // Function to display content
    );

    // Add submenu page for content
    add_submenu_page(
        'poh-doctor-switcher-admin',    // Parent slug
        'Landing Page A Content Page',                 // Page title
        'Landing Page A Content',                      // Menu title
        'edit_pages',                   // Capability
        'poh-doctor-switcher-landing-page-a-content',  // Menu slug
        'poh_doctor_switcher_landing_page_a_content_page' // Function to display content
    );

}

// Register the POH Doctor Switcher Plugin in the dashboard
add_action('admin_menu', 'poh_doctor_switcher_admin_menu');

function poh_doctor_switcher_enqueue_styles() {
    // Enqueue the CSS files
    wp_enqueue_style('poh-doctor-switcher-stylesheet', plugin_dir_url(__FILE__) . 'css/doctor-switcher-styles.css');
    wp_enqueue_style('poh-doctor-switcher-cards-stylesheet', plugin_dir_url(__FILE__) . 'css/doctor-switcher-cards-styles.css');
}

add_action('wp_enqueue_scripts', 'poh_doctor_switcher_enqueue_styles');





