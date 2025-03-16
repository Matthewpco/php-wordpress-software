<?php


// Handle AJAX form submission on server side
function paradigm_request_forms_submit() {

    check_ajax_referer('paradigm_request_forms_nonce');
    $full_name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $newpage = sanitize_text_field($_POST['newpage']);
    $site_url = sanitize_text_field($_POST['site-url']);
    $preferred_date = $_POST['date'];
        try {
            $date = new DateTime($preferred_date);
            $preferred_date = $date->format('Y-m-d');
        } catch (Exception $e) {
            // The date was not valid, handle the error here
        }
    $additional_links = sanitize_text_field($_POST['links']);
    $form_message = sanitize_textarea_field($_POST['message']);
    $send_to = get_option('paradigm_request_forms_email');
    
    // Start a session
    if (!session_id()) {
        session_start();
    }

    // Define the fields array
    $fields = array(
        'name' => $full_name,
        'email' => $email,
        'newpage' => $newpage,
        'site-url' => $site_url,
        'date' => $preferred_date,
        'message' => $form_message
    );

    // Check if any field is empty
    foreach ($fields as $field_name => $field_value) {
        if (empty($field_value)) {
            $_SESSION['error_message'] = "* Please enter your " . $field_name . " *";
            echo json_encode(array('error_message' => $_SESSION['error_message']));
            exit;
        }
    }

    // If all fields are filled and the form submission is successful,
    // return a JSON response indicating success
    echo json_encode(array('success_message' => 'Form submitted successfully'));

    // If date is not valid, handle the error here
   /* try {
        $date = new DateTime($fields['date']);
        $fields['date'] = $date->format('Y-m-d');
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Please enter a valid date.";
        echo json_encode(array('error_message' => $_SESSION['error_message']));
        exit;
    }*/

    if (!empty($_POST['fax'])) {
        // If data is entered into this hidden field this was likely a spam bot, so don't process the form
    } else {
        // This was likely a human, so process the form
        // send submission to database
        global $wpdb;
        $table_name = $wpdb->prefix . 'paradigm_request_forms';

        $data = array(
            'full_name' => $full_name,
            'email' => $email,
            'newpage' => $newpage,
            'site_url' => $site_url,
            'preferred_date' => $preferred_date,
            'form_message' => $form_message
        );
        
        $result = $wpdb->insert($table_name, $data);
        

        // Check for errors
        if ($result === false) {
            error_log('Database insertion failed, if you get this error after updating try re-activating the forms plugin.');
        } else {
            // If the insertion was successful, write the data to a CSV file
            $file = fopen(WP_CONTENT_DIR . '/request-submissions.csv', 'a'); // Open the file in append mode
            fputcsv($file, array($full_name, $email, $site_url, $preferred_date, $additional_links, $form_message));
            fclose($file); // Close the file
        }

        add_filter( 'wp_mail_content_type', 'prf_set_html_content_type' );
        $subject = 'New Form Submission';
        $message = 'Full Name: ' . $full_name . '<br>';
        $message .= 'Email: ' . $email . '<br>';
        $message .= 'New page or edit: ' . $newpage . '<br>';
        $message .= 'Site URL: ' . $site_url . '<br>';
        $message .= 'Preferred Completion Date: ' . $preferred_date. '<br>';
        $message .= 'Additional Links: ' . $additional_links . '<br>';
        $message .= 'Form Message: ' . $form_message . '<br>';
        $mail_result = wp_mail($send_to, $subject, $message);
        remove_filter( 'wp_mail_content_type', 'prf_set_html_content_type' );

        if (!$mail_result) {
            error_log('Form submission email sending failed');
        }

        add_filter( 'wp_mail_content_type', 'prf_set_html_content_type' );
        $subject = 'Confirmation of request form submission';
        $reply_message = '<div style="font-family: Arial, sans-serif;line-height: 1.5;">Thank you for contacting us!<br>We have received your request form submission.<br>Here is a copy of the information that you have submitted.<br>';
        $reply_message .= $message . '</div>';
        $reply_mail_result = wp_mail($email, $subject, $reply_message);
        remove_filter( 'wp_mail_content_type', 'prf_set_html_content_type' );

        if (!$reply_mail_result) {
            error_log('Auto reply email sending failed');
        }

        wp_die();

    }
}
add_action('wp_ajax_paradigm_request_forms_submit', 'paradigm_request_forms_submit');
add_action('wp_ajax_nopriv_paradigm_request_forms_submit', 'paradigm_request_forms_submit');