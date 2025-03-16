<?php
/*
Plugin Name: Paradigm Request Forms
Description: A plugin to create request forms
Version: 2.1.0
Author: Gary Matthew Payne
*/

require_once plugin_dir_path(__FILE__) . '/php/setup.php';
require_once plugin_dir_path(__FILE__) . '/php/admin-page.php';
require_once plugin_dir_path(__FILE__) . '/php/shortcode.php';
require_once plugin_dir_path(__FILE__) . '/php/submission-controller.php';

// Enqueue JavaScript for AJAX form submission and styles
function paradigm_request_forms_enqueue_scripts() {
    wp_enqueue_script('paradigm-request-form-scripts', plugin_dir_url(__FILE__) . 'js/paradigm-request-form-scripts.js', array(), false, true);
    wp_localize_script('paradigm-request-form-scripts', 'paradigm_request_forms_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('paradigm_request_forms_nonce')
    ));
    // Register and enqueue your base stylesheet
    wp_enqueue_style('paradigm-request-form-styles', plugin_dir_url(__FILE__) . 'css/paradigm-request-form-styles.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'paradigm_request_forms_enqueue_scripts');

// Hooks
register_activation_hook(__FILE__, 'paradigm_request_forms_plugin_activation');
//register_deactivation_hook(__FILE__, 'paradigm_forms_plugin_deactivation');
add_action('admin_post_prf_download_csv', 'prf_download_csv');


function prf_add_template_to_select($templates) {
    $templates['prf_template.php'] = 'PRF Template';
    return $templates;
}
add_filter('theme_page_templates', 'prf_add_template_to_select');

function prf_load_template($template) {
    global $post;

    // Check if the form has been submitted and a hidden field 'template_name' is set
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['template_name'])) {
        $template_name = $_POST['template_name'];

        // If the hidden field matches your custom template name, load the custom template
        if ($template_name == 'prf_template.php') {
            $template = dirname( __FILE__ ) . '/prf-template.php';
        }
    } else if ($post->page_template == 'prf_template.php') {
        // If the page has the custom template assigned, load the template from the plugin
        $template = dirname( __FILE__ ) . '/prf-template.php';
    }

    return $template;
}
add_filter('template_include', 'prf_load_template');
