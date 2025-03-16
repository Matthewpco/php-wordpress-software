<?php

if (get_option('asft_gforms_validation_ru_email')) {
    add_filter('gform_validation', 'check_ru_email');
} else {
    remove_filter('gform_validation', 'check_ru_email');
}

if (get_option('asft_gforms_validation_marketing_terms')) {
    add_filter('gform_validation', 'check_marketing_email');
} else {
    remove_filter('gform_validation', 'check_marketing_email');
}

if (get_option('asft_gforms_validation_ru_characters')) {
    add_filter('gform_field_validation_1', 'check_ru_characters', 10, 4);
} else {
    remove_filter('gform_field_validation_1', 'check_ru_characters', 10, 4);
}

if (get_option('asft_gforms_validation_links')) {
    add_filter('gform_field_validation_1', 'check_for_urls', 10, 4);
} else {
    remove_filter('gform_field_validation_1', 'check_for_urls', 10, 4);
}



function check_ru_characters($result, $value, $form, $field) {
    // Check if the field is the message field (replace 2 with your field ID)
    if ($field->id == 2) {
        // Regular expression to match Cyrillic characters
        if (preg_match('/[\p{Cyrillic}]/u', $value)) {
            $result['is_valid'] = false;
            $result['message'] = 'Links are not allowed.';
        }
    }
    return $result;
}


function check_for_urls($result, $value, $form, $field) {
    // Check if the field is the message field (replace 2 with your field ID)
    if ($field->id == 2) {
        // Regular expression to match Cyrillic characters
        if (preg_match('/\bhttps?:\/\/\S+/i', $value)) {
            $result['is_valid'] = false;
            $result['message'] = 'Your message contains invalid characters.';
        }
    }
    return $result;
}


function check_ru_email($validation_result) {
    $form = $validation_result['form'];
    foreach($form['fields'] as &$field) {
        if($field->type != 'email') continue;
        $field_value = rgpost("input_{$field->id}");
        if(substr($field_value, -3) == '.ru') {
            $validation_result['is_valid'] = false;
            $field->failed_validation = true;
            $field->validation_message = 'Emails ending with .ru are not allowed!';
        }
    }
    $validation_result['form'] = $form;
    return $validation_result;
}

function check_marketing_email($validation_result) {
    $form = $validation_result['form'];
    foreach($form['fields'] as &$field) {
        if($field->type != 'email') continue;
        $field_value = rgpost("input_{$field->id}");
        if (strpos($field_value, 'consumer') !== false || strpos($field_value, 'franchise') !== false) {
            $validation_result['is_valid'] = false;
            $field->failed_validation = true;
            $field->validation_message = 'Emails containing "consumer" or "franchise" are not allowed!';
        }        
    }
    $validation_result['form'] = $form;
    return $validation_result;
}