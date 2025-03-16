<?php
/*
Plugin Name: Anti-Spam Form Tools
Description: Adds a honeypot field to all Contact Form 7 forms to help prevent spam.
Plugin URI: https://github.com/Matthewpco/WP-Plugin-Anti-Spam-Form-Tools
Version: 1.5.0
Author: Gary Matthew Payne
Author URI: https://wpwebdevelopment.com/
License: GPL2
*/

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Define the plugin path
define( 'ASFT_PATH', plugin_dir_path( __FILE__ ) );

// Register a settings page
add_action('admin_menu', 'asft_honeypot_settings_page');
function asft_honeypot_settings_page() {
    add_options_page(
        'Anti-Spam Form Tools', // page title
        'Anti-Spam Form Tools', // menu title
        'manage_options', // capability
        'anti-spam-form-tools', // menu slug
        'asft_honeypot_settings_page_content' // callback function
    );
}

// Include other plugin files
require_once ASFT_PATH . 'inc/php/gravity-forms-ext.php';
require_once ASFT_PATH . 'inc/php/dashboard-page.php';




// Add the honeypot field to all CF7 forms
add_filter('wpcf7_form_elements', 'asft_honeypot_add_field');
function asft_honeypot_add_field($form) {

    if (get_option('asft_honeypot_enabled')) {
        $form .= '<input type="hidden" name="honeypot" value="" />';
    }

    return $form;
}


// Handle the honeypot field
add_action('wpcf7_before_send_mail', 'asft_honeypot_handle_field');
function asft_honeypot_handle_field($contact_form) {
    // Check if option is turned on
    if (get_option('asft_honeypot_enabled')) {
        // Check if honeypot field is filled out
        if (!empty($_POST['honeypot'])) {
            // Add a filter to clear the message if spam and prevent sending
            add_filter('wpcf7_mail_components', 'asft_honeypot_block_spam');
        }
    }
}

function asft_honeypot_block_spam($components) {
    // Set the recipient email address to an empty string
    $components['recipient'] = '';

    return $components;
}