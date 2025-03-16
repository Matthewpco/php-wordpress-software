<?php

// Handle AJAX form submission on server side ENTRY POINT for submissions
function paradigm_forms_submit() {

    paradigm_forms_validate_submission();

    $first_name = sanitize_text_field($_POST['first-name']);
    $last_name = sanitize_text_field($_POST['last-name']);
    $phone_number = sanitize_text_field($_POST['phone-number']);
    $email = sanitize_email($_POST['email']);
    $procedure_of_interest = sanitize_text_field($_POST['procedure-of-interest']);
    $referral = sanitize_text_field($_POST['referral']);
    $is_landing = sanitize_text_field($_POST['landing']);
    $form_message = wp_kses_post($_POST['form-message']);
    $landing_page_b = $_POST['landing_b'];
    

    if(!empty($_POST['locations'])) {
        $form_location = sanitize_text_field($_POST['locations']);
        $locations = sanitize_text_field($_POST['locations']);
        // match selected location with option to get iterator
        $locations_db_data = get_option('paradigm_forms_locations');
        if(!empty($locations_db_data)) {
            $locations_data = explode(',', $locations_db_data);
            $iterator = 1;
            foreach ($locations_data as $location_data) {
                $location_data = trim($location_data);
                $option_name = 'paradigm_forms_locations_' . $iterator;
                if($location_data === $locations) {
                    $locations = $option_name;
                } else {
                    $iterator = $iterator + 1;
                }
            }
        }
    }


    // handle $to field so that if enable locations is on it handles it that way else sets the option as below
    $enable_locations = get_option('pf_enable_forms_locations');
    if($enable_locations) {
        // handle multi locations to set $to variable
        //compare $locations iterator to email variables iterator and select the matching one for $to 
        preg_match('/\d+$/', $locations, $matches);
        $location_number = $matches[0];
        $data = get_option('paradigm_forms_locations_emails');
        $emails_data = explode(',', $data);
        $iterator = 1;
        foreach ($emails_data as $email_data) {
            $email_data = trim($email_data);  // Remove whitespace
            $option_name = 'paradigm_forms_locations_emails_' . $iterator;
            $option_name = get_option($option_name);
            if($location_number == $iterator) {
                $to = $option_name;
            } else {
                $iterator = $iterator + 1;
            }
            
        }
    } else {

        // handle $to field if locations is turned off
        $to = get_option('paradigm_forms_email');

    }

    
    // Handle $to email field if landing page b is submitter
    if ($landing_page_b) {
        $landing_page_b_email = get_option('paradigm_forms_landing_b_email');
        $landing_page_b_email_additional = get_option('paradigm_forms_landing_b_email_additional');
        $landing_page_b_subject = get_option('paradigm_forms_landing_b_subject');

        $landing_page_b_powerbi_email = get_option('pf_enable_landing_b_powerbi_mail');
        if ($landing_page_b_powerbi_email) {
            $landing_page_b_powerbi_email = "test@paradigmoralhealth.com";
        }

        $landing_page_b_quizsurvey_email = get_option('pf_enable_landing_b_quizsurvey_mail');
        if ($landing_page_b_quizsurvey_email) {
            $landing_page_b_quizsurvey_email = "quizsurvey@paradigmoralhealth.com";
        }
        
    }


    // Wrap in conditional that if enable_paradigm_forms option is on to process db request else do not
    $forms_display_enabled = get_option('pf_enable_forms_display');
    if ($forms_display_enabled == 1) {

        // This was likely a human, so process the form
        // send submission to database
        global $wpdb;
        $table_name = $wpdb->prefix . 'paradigm_forms';

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone_number' => $phone_number,
            'email' => $email,
            'procedure_of_interest' => $procedure_of_interest,
            'referral' => $referral,
            'form_message' => $form_message
        );
        
        if(!empty($form_location)) {
            $data['locations'] = $form_location;
        }
        
        $result = $wpdb->insert($table_name, $data);
        

        // Check for errors
        if ($result === false) {
            error_log('Database insertion failed, if you get this error after updating try re-activating the forms plugin.');
        } 
    }


    // Mail function for original landing page
    $form_landing_email = get_option('paradigm_forms_landing_email');
    if (!empty($form_landing_email && $is_landing) ) {

        $landing_page_second_email = get_option('paradigm_forms_landing_second_email');
        $landing_page_third_email = get_option('paradigm_forms_landing_third_email');

        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        add_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
        add_filter('wp_mail_from', 'set_from_email');
        $subject = 'New Form Submission';
        $message = 'First Name: ' . $first_name . '<br>';
        $message .= 'Last Name: ' . $last_name . '<br>';
        $message .= 'Phone Number: ' . $phone_number . '<br>';
        $message .= 'Email: ' . $email . '<br>';
        $message .= 'Procedure of Interest: ' . $procedure_of_interest . '<br>';
        $message .= 'Referral: ' . $referral . '<br>';
        $message .= 'Form Message: ' . $form_message . '<br>';
        $mail_result = wp_mail($form_landing_email, $subject, $message);
        $mail_result = wp_mail('kirsten.smith@paradigmoralhealth.com', $subject, $message);
        if (!empty($landing_page_second_email)) {
            $mail_result = wp_mail($landing_page_second_email, $subject, $message);
        }
        if (!empty($landing_page_third_email)) {
            $mail_result = wp_mail($landing_page_third_email, $subject, $message);
        }
        remove_filter('wp_mail_from', 'set_from_email');
        remove_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

        if ($mail_result) {
            wp_send_json_success(array('message' => 'Form submitted successfully.'));
        } else {
            wp_send_json_error(array('message' => 'Form failed to submit.'));
        }

        wp_die();
    }

    // Mail function for landing page b
    if (!empty($landing_page_b && $landing_page_b_email) ) {
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        add_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
        add_filter('wp_mail_from', 'set_from_email');
        $subject = 'New Form Submission';
        if ($landing_page_b_subject) {
            $subject = $landing_page_b_subject;
        }
        $message = 'First Name: ' . $first_name . '<br>';
        $message .= 'Last Name: ' . $last_name . '<br>';
        $message .= 'Phone Number: ' . $phone_number . '<br>';
        $message .= 'Email: ' . $email . '<br>';
        $message .= 'Procedure of Interest: ' . $procedure_of_interest . '<br>';
        $message .= 'Referral: ' . $referral . '<br>';
        $message .= 'Form Message: ' . $form_message . '<br>';
        $mail_result = wp_mail($landing_page_b_email, $subject, $message);
        if (!empty($landing_page_b_email_additional)) {
            $mail_result = wp_mail($landing_page_b_email_additional, $subject, $message);
        }
        if (!empty($landing_page_b_quizsurvey_email)) {
            $mail_result = wp_mail($landing_page_b_quizsurvey_email, $subject, $message);
        }
        remove_filter('wp_mail_from', 'set_from_email');
        remove_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

        if ($mail_result) {
            wp_send_json_success(array('message' => 'Form submitted successfully.'));
        } else {
            wp_send_json_error(array('message' => 'Form failed to submit.'));
        }

        wp_die();
    }
    

    add_filter( 'wp_mail_content_type', 'set_html_content_type' );
    add_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
    add_filter('wp_mail_from', 'set_from_email');
    $subject = 'New Form Submission';
    $message = 'First Name: ' . $first_name . '<br>';
    $message .= 'Last Name: ' . $last_name . '<br>';
    $message .= 'Phone Number: ' . $phone_number . '<br>';
    $message .= 'Email: ' . $email . '<br>';
    $message .= 'Procedure of Interest: ' . $procedure_of_interest . '<br>';
    if(!empty($form_location)) {
        $message .= 'Location: ' . $form_location . '<br>';
    }
    $message .= 'Referral: ' . $referral . '<br>';
    $message .= 'Form Message: ' . $form_message . '<br>';
    $mail_result = wp_mail($to, $subject, $message);
    
    remove_filter('wp_mail_from', 'set_from_email');
    remove_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
    remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

    if ($mail_result) {
        wp_send_json_success(array('message' => 'Form submitted successfully.'));
    } else {
        wp_send_json_error(array('message' => 'Form failed to submit.'));
    }

    wp_die();

}

add_action('wp_ajax_paradigm_forms_submit', 'paradigm_forms_submit');
add_action('wp_ajax_nopriv_paradigm_forms_submit', 'paradigm_forms_submit');


function paradigm_forms_validate_submission() {

    $csrf_token = $_POST['csrf_token'];
    if (!validate_token($csrf_token)) {
        // CSRF token does not match, handle the error
        error_log('CSRF Token does not match');
        die('Invalid CSRF token');
    }

    $nonce_validation = check_ajax_referer('paradigm_forms_nonce');
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

    // Get query parameters and run limiting function if false
    $bypass = sanitize_text_field($_POST['bypass']);

    if ($bypass == false) {
        paradigm_forms_submission_limiting(); 
    }

}


function paradigm_forms_submission_limiting() {

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
        die;
    } else {
        $new_transient = set_transient($transient_key, $ip, 300);
    }

}