<?php
/*
Plugin Name: POH Quiz Forms
Description: Creates shortcodes for quiz forms.
Plugin URI: https://github.com/Matthewpco/
Version: 1.8.0
Author: Joseph Isaac Shown
Author URI: https://wpwebdevelopment.com/
License: GPL2
*/

// Use require_once to include your functions file
require_once plugin_dir_path(__FILE__) . '/php/admin-page.php';
require_once plugin_dir_path(__FILE__) . '/php/form-shortcodes.php';
require_once plugin_dir_path(__FILE__) . '/php/setup.php';
require_once plugin_dir_path(__FILE__) . '/php/handle-submissions.php';
require_once plugin_dir_path(__FILE__) . '/php/csrf-token.php';

// Hooks
//register_deactivation_hook(__FILE__, 'poh_quiz_form_a_plugin_deactivation');


// Enqueue JavaScript for AJAX form submission and styles
function poh_quiz_form_a_enqueue_scripts() {
    wp_enqueue_script('poh-quiz-form-a-scripts', plugin_dir_url(__FILE__) . 'js/poh-quiz-form-a-scripts.js', array(), false, true);
    wp_localize_script('poh-quiz-form-a-scripts', 'poh_quiz_form_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('poh_quiz_form_nonce')
    ));
    // Register and enqueue your base stylesheet
    wp_enqueue_style('poh-quiz-form-a-styles', plugin_dir_url(__FILE__) . 'css/poh-quiz-form-a-styles.css', array(), '1.0.0');
    
}
add_action('wp_enqueue_scripts', 'poh_quiz_form_a_enqueue_scripts');


function poh_quiz_forms_activate() {
    poh_quiz_forms_add_rewrite_rule();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'poh_quiz_forms_activate');

function poh_quiz_forms_deactivate() {
    flush_rewrite_rules();
    delete_option('poh_quiz_form_a_email');
}
register_deactivation_hook( __FILE__, 'poh_quiz_forms_deactivate' );

// Functions to add new page query vars, rewrite urls, and load templates for urls.
function poh_quiz_forms_register_query_var( $vars ) {
    $new_vars = array('pqf_thanks_1', 'pqf_thanks_2', 'pqf_thanks_3');
    foreach ($new_vars as $var) {
        $vars[] = $var;
    }
    return $vars;
}
add_filter( 'query_vars', 'poh_quiz_forms_register_query_var' );


function poh_quiz_forms_add_rewrite_rule() {
    $rewrite_rules = array(
        'pqf-thanks-1' => 'index.php?pqf_thanks_1=1',
        'pqf-thanks-2' => 'index.php?pqf_thanks_2=1',
        'pqf-thanks-3' => 'index.php?pqf_thanks_3=1',
    );

    foreach ($rewrite_rules as $key => $value) {
        add_rewrite_rule( $key, $value, 'top');
    }

    flush_rewrite_rules();
}
add_action('init', 'poh_quiz_forms_add_rewrite_rule', 10, 0);


function poh_quiz_forms_custom_url_template_include( $template ) {
    global $wp_query;
    $current_query_vars = $wp_query->query_vars;

    if (isset($current_query_vars['pqf_thanks_1'])) {

        error_log('Switch is working 1');
        $pqf_thanks_1 = plugin_dir_path(__FILE__) . 'templates/pqf-thanks-1.php';
        if ( file_exists( $pqf_thanks_1 ) ) {
            return $pqf_thanks_1;
        }

    }

    else if (isset($current_query_vars['pqf_thanks_2'])) {

        error_log('Switch is working 2');
        $pqf_thanks_2 = plugin_dir_path(__FILE__) . 'templates/pqf-thanks-2.php';
        if ( file_exists( $pqf_thanks_2 ) ) {
            return $pqf_thanks_2;
        }
        
    }

    else if (isset($current_query_vars['pqf_thanks_3'])) {

        error_log('Switch is working 3');
        $pqf_thanks_3 = plugin_dir_path(__FILE__) . 'templates/pqf-thanks-3.php';
        if ( file_exists( $pqf_thanks_3 ) ) {
            return $pqf_thanks_3;
        }
        
    }

    return $template;
}
add_filter( 'template_include', 'poh_quiz_forms_custom_url_template_include' );