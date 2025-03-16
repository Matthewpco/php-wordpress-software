<?php

function poh_quiz_form_a_validate_submission() {

    $csrf_token = $_POST['csrf_token'];
    if (!poh_quiz_form_a_validate_token($csrf_token)) {
        // CSRF token does not match, handle the error
        error_log('CSRF Token does not match');
        die('Invalid CSRF token');
    }

    $nonce_validation = check_ajax_referer('poh_quiz_form_nonce');
    if (!$nonce_validation) {
        error_log('The nonce did not validate');
        error_log($nonce_validation);
        die('Invalid nonce');
    }

    if (!empty($_POST['fax'])) {
        // If data is entered into this hidden field this was likely a spam bot, so don't process the form
        error_log($_POST['fax']);
        die('Invalid honeypot input');
    }

    if (empty($_POST['first-name'])) {
        error_log('First name empty');
        die('Invalid First name');
    }

    if (empty($_POST['last-name'])) {
        error_log('Last name empty');
        die('Invalid Last name');
    }

    if (empty($_POST['phone-number'])) {
        error_log('Phone number empty');
        die('Invalid phone number');
    }

    if (empty($_POST['email'])) {
        error_log('Email address empty');
        die('Invalid email address');
    }

    // Get query parameters and run limiting function if false
    $bypass = sanitize_text_field($_POST['bypass']);

    if ($bypass == false) {
        paradigm_quiz_forms_submission_limiting(); 
    }

}


function poh_quiz_form_a_score_mail_controller($sanitized_fields) {
    $score = $sanitized_fields['quiz-score'];
    if ($score < 20) {
        $low_score_email = get_option('poh_quiz_form_a_low_score_email');
        if (isset($low_score_email)) {
            poh_quiz_form_a_mail_controller($low_score_email, $sanitized_fields);
        }
    } else if ($score < 40) {
        $medium_score_email = get_option('poh_quiz_form_a_medium_score_email');
        if (isset($medium_score_email)) {
            poh_quiz_form_a_mail_controller($medium_score_email, $sanitized_fields);
        }
    } else if ($score > 39) {
        $high_score_email = get_option('poh_quiz_form_a_high_score_email');
        if (isset($high_score_email)) {
            poh_quiz_form_a_mail_controller($high_score_email, $sanitized_fields);
        }
    }
}

function poh_quiz_form_a_mail_controller($email, $sanitized_fields) {

    add_filter( 'wp_mail_content_type', 'poh_quiz_form_a_set_html_content_type' );
    add_filter( 'wp_mail_from_name', 'poh_quiz_form_a_custom_wp_mail_from_name' );
    add_filter('wp_mail_from', 'poh_quiz_form_a_set_from_email');
    $subject = 'New Form Submission';
    $message = '';
    foreach ($sanitized_fields as $key => $value) {
        $key = str_replace('-', ' ', $key); // Replace dashes with space for key
        $key = ucfirst($key); // Capitalize first letter of key
        $message .= $key . ': ' . $value . '<br>';
    }
    $mail_result = wp_mail($email, $subject, $message);
    remove_filter('wp_mail_from', 'poh_quiz_form_a_set_from_email');
    remove_filter( 'wp_mail_from_name', 'poh_quiz_form_a_custom_wp_mail_from_name' );
    remove_filter( 'wp_mail_content_type', 'poh_quiz_form_a_set_html_content_type' );
    
    if (!$mail_result) {
        error_log('Email sending failed');
        // Log the mail result
        error_log('Mail result: ' . print_r($mail_result, true));
    }

}


function poh_quiz_form_a_reply_mail_controller($email, $name) {

    add_filter( 'wp_mail_content_type', 'poh_quiz_form_a_set_html_content_type' );
    add_filter( 'wp_mail_from_name', 'poh_quiz_form_a_custom_wp_mail_from_name' );
    add_filter('wp_mail_from', 'poh_quiz_form_a_set_from_email');
    $subject = 'Thank you for your submission';
    $message = 'Thank you ' . $name . ' for your submission!';
    $mail_result = wp_mail($email, $subject, $message);
    remove_filter('wp_mail_from', 'poh_quiz_form_a_set_from_email');
    remove_filter( 'wp_mail_from_name', 'poh_quiz_form_a_custom_wp_mail_from_name' );
    remove_filter( 'wp_mail_content_type', 'poh_quiz_form_a_set_html_content_type' );
    
    if (!$mail_result) {
        error_log('Email sending failed');
        // Log the mail result
        error_log('Mail result: ' . print_r($mail_result, true));
    }

}


function poh_quiz_form_a_controller() {

    // Initialize an array to hold sanitized fields and meta fields to remove
    $sanitized_fields = [];
    $fields_to_remove = ['poh-quiz-form-a','fax', 'csrf_token', 'action', '_ajax_nonce'];

    // Loop through all fields in the $_POST array and sanitize them
    foreach ($_POST as $field => $value) {   

        if (!in_array($field, $fields_to_remove)) {
            // Sanitize and add to the sanitized fields array
            $sanitized_fields[$field] = sanitize_text_field($value);
        }
    }

    // handle $to field if locations is turned off
    $to = get_option('poh_quiz_form_a_email');
    if (isset($to)) {
        poh_quiz_form_a_mail_controller($to, $sanitized_fields);
    }

    poh_quiz_form_a_score_mail_controller($sanitized_fields);
    // Additional mail sent to an email for powerbi
    $powerbi_email = 'quizsurvey@paradigmoralhealth.com';
    poh_quiz_form_a_mail_controller($powerbi_email, $sanitized_fields);

    // Reply email sent to form submitter
    $reply_email_switch = get_option('poh_quiz_form_a_reply_email');
    if ($reply_email_switch) {
        $send_to_email = $sanitized_fields['email'];
        $submission_name = $sanitized_fields['first-name'];
        poh_quiz_form_a_reply_mail_controller($send_to_email, $submission_name);
    }
    

}

function poh_quiz_form_b_controller() {
    error_log('inside function poh quiz form b controller');
}

// Handle AJAX form submission on server side CHANGE FROM POH QUIZ FORM A  TO JUST QUIZ FORM AND ADD FUNCTIONS FOR BOTH
function poh_quiz_forms_submit() {
    
    poh_quiz_form_a_validate_submission();

    error_log(print_r($_POST, true));
    if (isset($_POST['poh-quiz-form-a'])) {
        poh_quiz_form_a_controller(); 
    }

    else if (isset($_POST['poh-quiz-form-b'])) {
        poh_quiz_form_b_controller();
    }


}
add_action('wp_ajax_poh_quiz_forms_submit', 'poh_quiz_forms_submit');
add_action('wp_ajax_nopriv_poh_quiz_forms_submit', 'poh_quiz_forms_submit');


function paradigm_quiz_forms_submission_limiting() {

    // Check IP and add to a 5 minute transient, then check is transiest still exists and block if it does.
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // Check if IP is from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        error_log('In spam controls http client ip');
        error_log($ip);
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Check if IP is passed from a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        error_log('In spam control http forward');
        error_log($ip);
    } else {
        // Get the remote IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        error_log('In spam controls remote address');
        error_log($ip);
    }


    // Create a unique key for transient
    $transient_key = 'user_ip_' . md5($ip);
    // Check for existing transient before doing anything else
    $transient_exists = get_transient($transient_key);

    // If transient exists log and die else set transient
    if($transient_exists) {
        error_log('In transient exists');
        die;
    } else {
        $new_transient = set_transient($transient_key, $ip, 300);
    }

}