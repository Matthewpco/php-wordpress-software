<?php

function poh_quiz_form_a_admin_menu() {
    // Add the main menu page
    add_menu_page(
        'POH Quiz Form A',
        'POH Quiz Form A',
        'edit_pages',
        'poh-quiz-form-a',
        'poh_quiz_form_a_admin_page'
    );
    
}

add_action('admin_menu', 'poh_quiz_form_a_admin_menu');


function poh_quiz_form_a_set_from_email() {
    return 'Paradigm@' . $_SERVER['SERVER_NAME'];
}
add_filter('wp_mail_from', 'poh_quiz_form_a_set_from_email');

// This function sets the email Content-Type to text/html
function poh_quiz_form_a_set_html_content_type() {
    return 'text/html';
}

// This function sets the From name
function poh_quiz_form_a_custom_wp_mail_from_name() {
    return 'Paradigm'; // replace with your name or your site's name
}

// Delete custom database table on plugin deactivation
function poh_quiz_form_a_plugin_deactivation() {

    delete_option('poh_quiz_form_a_email');
}
