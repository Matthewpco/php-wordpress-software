<?php

function paradigm_forms_landing_admin_page() {
    
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    
    
    // Check if the form was submitted
    if (isset($_POST['submit'])) {

        $enable_landing_b_powerbi_mail = isset($_POST['pf_enable_landing_b_powerbi_mail']) ? 1 : 0;
        update_option('pf_enable_landing_b_powerbi_mail', $enable_landing_b_powerbi_mail);

        $enable_landing_b_quizsurvey_mail = isset($_POST['pf_enable_landing_b_quizsurvey_mail']) ? 1 : 0;
        update_option('pf_enable_landing_b_quizsurvey_mail', $enable_landing_b_quizsurvey_mail);

        $paradigm_forms_landing_b_subject = isset($_POST['paradigm_forms_landing_b_subject']) ? $_POST['paradigm_forms_landing_b_subject'] : '';
        update_option('paradigm_forms_landing_b_subject', $paradigm_forms_landing_b_subject);

        $paradigm_forms_landing_email = isset($_POST['paradigm_forms_landing_email']) ? $_POST['paradigm_forms_landing_email'] : '';
        update_option('paradigm_forms_landing_email', $paradigm_forms_landing_email);

        $paradigm_forms_landing_second_email = isset($_POST['paradigm_forms_landing_second_email']) ? $_POST['paradigm_forms_landing_second_email'] : '';
        update_option('paradigm_forms_landing_second_email', $paradigm_forms_landing_second_email);

        $paradigm_forms_landing_third_email = isset($_POST['paradigm_forms_landing_third_email']) ? $_POST['paradigm_forms_landing_third_email'] : '';
        update_option('paradigm_forms_landing_third_email', $paradigm_forms_landing_third_email);

        $paradigm_forms_landing_b_email = isset($_POST['paradigm_forms_landing_b_email']) ? $_POST['paradigm_forms_landing_b_email'] : '';
        update_option('paradigm_forms_landing_b_email', $paradigm_forms_landing_b_email);

        $paradigm_forms_landing_b_email_additional = isset($_POST['paradigm_forms_landing_b_email_additional']) ? $_POST['paradigm_forms_landing_b_email_additional'] : '';
        update_option('paradigm_forms_landing_b_email_additional', $paradigm_forms_landing_b_email_additional);

        $paradigm_forms_landing_b_heading = isset($_POST['paradigm_forms_landing_b_heading']) ? $_POST['paradigm_forms_landing_b_heading'] : '';
        update_option('paradigm_forms_landing_b_heading', $paradigm_forms_landing_b_heading);

        // Give user a notice of settings updated
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>';
        });
        
    }

    $enable_landing_b_powerbi_mail = get_option('pf_enable_landing_b_powerbi_mail');
    $enable_landing_b_quizsurvey_mail = get_option('pf_enable_landing_b_quizsurvey_mail');
    $paradigm_forms_landing_b_subject = get_option('paradigm_forms_landing_b_subject');
    $paradigm_forms_landing_email = get_option('paradigm_forms_landing_email');
    $paradigm_forms_landing_second_email = get_option('paradigm_forms_landing_second_email');
    $paradigm_forms_landing_third_email = get_option('paradigm_forms_landing_third_email');
    $paradigm_forms_landing_b_email = get_option('paradigm_forms_landing_b_email');
    $paradigm_forms_landing_b_email_additional = get_option('paradigm_forms_landing_b_email_additional');
    $paradigm_forms_landing_b_heading = wp_unslash(get_option('paradigm_forms_landing_b_heading'));

    ?>
    <div class="wrap">
        <h1>Paradigm Forms Landing Page Settings</h1>
        <form id="paradigm-landing-admin-form" method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Send submissions to powerbi email for Landing Page B * NEEDS ADDRESS</th>
                    <td><input id="enable_landing_b_powerbi_mail" type="checkbox" name="pf_enable_landing_b_powerbi_mail" value="1" <?php checked($enable_landing_b_powerbi_mail, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Send submissions to quizsurvery email for Landing Page B</th>
                    <td><input id="enable_landing_b_quizsurvey_mail" type="checkbox" name="pf_enable_landing_b_quizsurvey_mail" value="1" <?php checked($enable_landing_b_quizsurvey_mail, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th colspan="2"><h4>Original Landing Page Form Settings</h4></th>
                </tr>
                <tr id="form-landing-email-row" valign="top">
                    <th scope="row">Send to mail address for Original Landing Page</th>
                    <td><input type="email" id="paradigm_forms_landing_email" name="paradigm_forms_landing_email"
                     value="<?php echo esc_attr($paradigm_forms_landing_email); ?>">
                    </td>
                </tr>
                <tr id="form-landing-email-row-additional" valign="top">
                    <th scope="row">Second send to mail address for Original Landing Page</th>
                    <td><input type="email" id="paradigm_forms_landing_second_email" name="paradigm_forms_landing_second_email"
                     value="<?php echo esc_attr($paradigm_forms_landing_second_email); ?>">
                    </td>
                </tr>
                tr id="form-landing-email-row-additional" valign="top">
                    <th scope="row">Third send to mail address for Original Landing Page</th>
                    <td><input type="email" id="paradigm_forms_landing_third_email" name="paradigm_forms_landing_third_email"
                     value="<?php echo esc_attr($paradigm_forms_landing_third_email); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th colspan="2"><h4>Landing Page B Form Settings</h4></th>
                </tr>
                <tr id="form-email-subject-row" valign="top">
                    <th scope="row">Subject line for Landing Page B form emails</th>
                    <td><input type="text" id="paradigm_forms_landing_b_subject" name="paradigm_forms_landing_b_subject"
                     value="<?php echo esc_attr($paradigm_forms_landing_b_subject); ?>">
                    </td>
                </tr>
                <tr id="form-landing-b-email-row" valign="top">
                    <th scope="row">Send to mail address for Landing Page B</th>
                    <td><input type="email" id="paradigm_forms_landing_b_email" name="paradigm_forms_landing_b_email"
                     value="<?php echo esc_attr($paradigm_forms_landing_b_email); ?>">
                    </td>
                </tr>
                <tr id="form-landing-b-email-row-additional" valign="top">
                    <th scope="row">Additional Send to mail address for Landing Page B</th>
                    <td><input type="email" id="paradigm_forms_landing_b_email_additional" name="paradigm_forms_landing_b_email_additional"
                     value="<?php echo esc_attr($paradigm_forms_landing_b_email_additional); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Form heading text for Landing Page B</th>
                    <td><input type="text" id="paradigm_forms_landing_b_heading" name="paradigm_forms_landing_b_heading" value="<?php echo esc_attr($paradigm_forms_landing_b_heading); ?>"></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php
 
}