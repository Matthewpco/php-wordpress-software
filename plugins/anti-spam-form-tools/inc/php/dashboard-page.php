<?php

function asft_honeypot_settings_page_content() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Update the options in the database
        $gforms_validation_ru_email = isset($_POST['asft_gforms_validation_ru_email']) ? 1 : 0;
        update_option('asft_gforms_validation_ru_email', $gforms_validation_ru_email);

        $gforms_validation_marketing_terms = isset($_POST['asft_gforms_validation_marketing_terms']) ? 1 : 0;
        update_option('asft_gforms_validation_marketing_terms', $gforms_validation_marketing_terms);

        $gforms_validation_ru_characters = isset($_POST['asft_gforms_validation_ru_characters']) ? 1 : 0;
        update_option('asft_gforms_validation_ru_characters', $gforms_validation_ru_characters);

        $gforms_validation_links = isset($_POST['asft_gforms_validation_links']) ? 1 : 0;
        update_option('asft_gforms_validation_links', $gforms_validation_links);

        $honeypot_enabled = isset($_POST['asft_honeypot_enabled']) ? 1 : 0;
        update_option('asft_honeypot_enabled', $honeypot_enabled);

    }


    // Get the current values of the options from the database
    $gforms_validation_ru_email = get_option('asft_gforms_validation_ru_email');
    $gforms_validation_marketing_terms = get_option('asft_gforms_validation_marketing_terms');
    $gforms_validation_ru_characters = get_option('asft_gforms_validation_ru_characters');
    $gforms_validation_links = get_option('asft_gforms_validation_links');
    $honeypot_enabled = get_option('asft_honeypot_enabled');


    // Display the form
    ?>
    <div class="wrap">
        <h2>Anti-Spam Form Tools</h2>
        <form method="post" action="">
            <h3>Gravity forms functions</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Enable validation to block form submissions with ru email address</th>
                    <td><input type="checkbox" name="asft_gforms_validation_ru_email" value="1" <?php checked($gforms_validation_ru_email, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable validation to block form submissions with marketing terms in email</th>
                    <td><input type="checkbox" name="asft_gforms_validation_marketing_terms" value="1" <?php checked($gforms_validation_marketing_terms, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable validation to block form submissions with Russian characters</th>
                    <td><input type="checkbox" name="asft_gforms_validation_ru_characters" value="1" <?php checked($gforms_validation_ru_characters, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable validation to block form submissions with links</th>
                    <td><input type="checkbox" name="asft_gforms_validation_links" value="1" <?php checked($gforms_validation_links, 1); ?> /></td>
                </tr>
            </table>
            
            <h3>Contact form 7 functions</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Enable Honeypot for cf7 forms</th>
                    <td><input type="checkbox" name="asft_honeypot_enabled" value="1" <?php checked($honeypot_enabled, 1); ?> /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}