<?php

function paradigm_forms_admin_menu() {
    // Add the main menu page
    add_menu_page(
        'Paradigm Forms',
        'Paradigm Forms',
        'edit_pages',
        'paradigm-forms',
        'paradigm_forms_admin_page'
    );

    // Add the "Forms CSS" submenu page
    add_submenu_page(
        'paradigm-forms', // Parent menu slug
        'Landing Page Forms', // Page title
        'Landing Page Forms', // Menu title
        'edit_pages', // Capability
        'paradigm-forms-landing', // Menu slug
        'paradigm_forms_landing_admin_page' // Function to display the page
    );
    
    // Add the "Forms CSS" submenu page
    add_submenu_page(
        'paradigm-forms',
        'Forms CSS',
        'Forms CSS',
        'edit_pages',
        'paradigm-forms-css',
        'poh_forms_css_admin_page'
    );
}

add_action('admin_menu', 'paradigm_forms_admin_menu');



function set_from_email() {
    return 'Paradigm@' . $_SERVER['SERVER_NAME'];
}
add_filter('wp_mail_from', 'set_from_email');

// This function sets the email Content-Type to text/html
function set_html_content_type() {
    return 'text/html';
}

// This function sets the From name
function custom_wp_mail_from_name() {
    return 'Paradigm'; // replace with your name or your site's name
}

// Create custom database table on plugin activation
function paradigm_forms_plugin_activation() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'paradigm_forms';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        first_name varchar(255) NOT NULL,
        last_name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone_number varchar(255) NOT NULL,
        procedure_of_interest varchar(255) NOT NULL,
        locations varchar(255) NOT NULL,
        referral varchar(255) NOT NULL,
        form_message varchar(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
$setup_path = plugin_dir_path(__FILE__) . 'paradigm-forms.php';

// Delete custom database table on plugin deactivation
function paradigm_forms_plugin_deactivation() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'paradigm_forms';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);

    delete_option('poh_forms_css'); // Clean up the option when the plugin is deactivated
    delete_option('pf_enable_forms_display');
    delete_option('paradigm_forms_email');
}


function poh_forms_enqueue_codemirror() {
    $cm_url = 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.3/';
    wp_enqueue_style('codemirror-css', $cm_url . 'codemirror.min.css');
    wp_enqueue_script('codemirror-js', $cm_url . 'codemirror.min.js', array(), false, true);
    wp_enqueue_script('codemirror-mode-js', $cm_url . 'mode/css/css.min.js', array('codemirror-js'), false, true);
}
add_action('admin_enqueue_scripts', 'poh_forms_enqueue_codemirror');


function pf_admin_footer() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cssTextarea = document.querySelector('textarea[name="poh_forms_css"]');
            

            if(cssTextarea) {

                let editorOptions = {
                    lineNumbers: true, // Show line numbers on the left side of the editor
                    mode: 'css',       // Set the language mode to CSS
                    theme: 'default',  // Set the default theme; change this if you have other themes available
                    autoCloseBrackets: true,
                    matchBrackets: true,
                    styleActiveLine: true,
                    showCursorWhenSelecting: true,
                    lineWrapping: true,// Lines will wrap instead of extending horizontally
                    tabSize: 4,
                    indentUnit: 4
                };
                let cssEditor = CodeMirror.fromTextArea(cssTextarea, editorOptions);
                cssEditor.getWrapperElement().style.minHeight = '70vh'; // Set the minimum height
                
            }
            
    });
    </script>
    <?php
}
add_action('admin_footer', 'pf_admin_footer');

