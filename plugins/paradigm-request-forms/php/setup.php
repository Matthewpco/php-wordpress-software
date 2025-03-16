<?php

// Register the menu
function paradigm_request_forms_menu() {
    add_menu_page(
        'Paradigm Request Forms', // Page title
        'Paradigm Request Forms', // Menu title
        'manage_options', // Capability
        'paradigm-request-forms', // Menu slug
        'paradigm_request_forms_admin_page' // Function to display the admin page
    );
}
add_action('admin_menu', 'paradigm_request_forms_menu');


// This function sets the email Content-Type to text/html
function prf_set_html_content_type() {
    return 'text/html';
}


// Create custom database table on plugin activation
function paradigm_request_forms_plugin_activation() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'paradigm_request_forms';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        full_name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        site_url varchar(255) NOT NULL,
        preferred_date DATE NOT NULL,
        additional_links varchar(255) NOT NULL,
        form_message varchar(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


function prf_download_csv() {
    $file = WP_CONTENT_DIR . '/request-submissions.csv';

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        flush(); // Flush system output buffer
        readfile($file);
        exit;
    }
}