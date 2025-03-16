<?php
/*
Plugin Name: Paradigm Forms
Description: Creates shortcodes for full size and sidebar sized forms as well as landing pages.
Plugin URI: https://github.com/Matthewpco/WP-Plugin-Modal-Form-Shortcode
Version: 5.0.3
Author: Joseph Isaac Shown
Author URI: https://wpwebdevelopment.com/
License: GPL2
*/

// Use require_once to include your functions file
require_once plugin_dir_path(__FILE__) . '/php/admin-page.php';
require_once plugin_dir_path(__FILE__) . '/php/admin-landing-page.php';
require_once plugin_dir_path(__FILE__) . '/php/forms-css-admin-page.php';
require_once plugin_dir_path(__FILE__) . '/php/form-shortcodes.php';
require_once plugin_dir_path(__FILE__) . '/php/setup.php';
require_once plugin_dir_path(__FILE__) . '/php/handle-submissions.php';
require_once plugin_dir_path(__FILE__) . '/php/csrf-token.php';

// Hooks
register_activation_hook(__FILE__, 'paradigm_forms_plugin_activation');
register_deactivation_hook(__FILE__, 'paradigm_forms_plugin_deactivation');


// Enqueue JavaScript for AJAX form submission and styles
function paradigm_forms_enqueue_scripts() {
    wp_enqueue_script('paradigm-forms-scripts', plugin_dir_url(__FILE__) . 'js/paradigm-forms-scripts.js', array(), false, true);
    wp_localize_script('paradigm-forms-scripts', 'paradigm_forms_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('paradigm_forms_nonce')
    ));
    // Register and enqueue your base stylesheet
    wp_enqueue_style('paradigm-forms-inline', plugin_dir_url(__FILE__) . 'css/paradigm-forms.css', array(), '1.0.0');
    wp_enqueue_style('paradigm-forms-styles', plugin_dir_url(__FILE__) . 'css/paradigm-forms-style.css', array(), '1.0.0');

    // Add inline styles to the registered stylesheet
    $poh_forms_css = get_option('poh_forms_css');
    $poh_forms_css = wp_unslash($poh_forms_css);
    if (!empty($poh_forms_css)) {
        wp_add_inline_style('paradigm-forms-inline', $poh_forms_css);
    }
    
}
add_action('wp_enqueue_scripts', 'paradigm_forms_enqueue_scripts');

function paradigm_forms_enqueue_admin_scripts() {
    wp_enqueue_script('paradigm-forms-admin', plugins_url('/js/paradigm-forms-admin-script.js', __FILE__), array('jquery'), '1.0', true);
}

add_action('admin_enqueue_scripts', 'paradigm_forms_enqueue_admin_scripts');