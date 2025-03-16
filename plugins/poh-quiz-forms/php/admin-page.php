<?php

function poh_quiz_form_a_admin_page() {
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    


    if (isset($_POST['submit'])) {
        $poh_quiz_form_a_email = isset($_POST['poh_quiz_form_a_email']) ? $_POST['poh_quiz_form_a_email'] : '';
        update_option('poh_quiz_form_a_email', $poh_quiz_form_a_email);

        $poh_quiz_form_a_low_score_email = isset($_POST['poh_quiz_form_a_low_score_email']) ? $_POST['poh_quiz_form_a_low_score_email'] : '';
        update_option('poh_quiz_form_a_low_score_email', $poh_quiz_form_a_low_score_email);

        $poh_quiz_form_a_medium_score_email = isset($_POST['poh_quiz_form_a_medium_score_email']) ? $_POST['poh_quiz_form_a_medium_score_email'] : '';
        update_option('poh_quiz_form_a_medium_score_email', $poh_quiz_form_a_medium_score_email);

        $poh_quiz_form_a_high_score_email = isset($_POST['poh_quiz_form_a_high_score_email']) ? $_POST['poh_quiz_form_a_high_score_email'] : '';
        update_option('poh_quiz_form_a_high_score_email', $poh_quiz_form_a_high_score_email);

        $poh_quiz_form_a_high_score_email = isset($_POST['poh_quiz_form_a_high_score_email']) ? $_POST['poh_quiz_form_a_high_score_email'] : '';
        update_option('poh_quiz_form_a_high_score_email', $poh_quiz_form_a_high_score_email);

        $poh_quiz_form_a_reply_email = isset($_POST['poh_quiz_form_a_reply_email']) ? 1 : 0;
        update_option('poh_quiz_form_a_reply_email', $poh_quiz_form_a_reply_email);

    }
    
    $poh_quiz_form_a_email = get_option('poh_quiz_form_a_email');
    $poh_quiz_form_a_low_score_email = get_option('poh_quiz_form_a_low_score_email');
    $poh_quiz_form_a_medium_score_email = get_option('poh_quiz_form_a_medium_score_email');
    $poh_quiz_form_a_high_score_email = get_option('poh_quiz_form_a_high_score_email');
    $poh_quiz_form_a_reply_email = get_option('poh_quiz_form_a_reply_email');


    ?>
    <div class="wrap">
        <h1>Paradigm Forms Settings</h1>
        <form id="poh-quiz-form-a-admin" method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Send reply email to person submitting form</th>
                    <td><input id="poh_quiz_form_a_reply_email" type="checkbox" name="poh_quiz_form_a_reply_email" value="1" <?php checked($poh_quiz_form_a_reply_email, 1); ?> /></td>
                </tr>
                <tr id="form-email-row" valign="top">
                    <th scope="row">Set forms send to mail address for single location</th>
                    <td><input type="email" id="poh_quiz_form_a_email" name="poh_quiz_form_a_email"
                        value="<?php echo esc_attr($poh_quiz_form_a_email); ?>">
                    </td>
                </tr>
                <tr id="form-email-row" valign="top">
                    <th scope="row">Set forms send to mail address for low score submissions</th>
                    <td><input type="email" id="poh_quiz_form_a_low_score_email" name="poh_quiz_form_a_low_score_email"
                        value="<?php echo esc_attr($poh_quiz_form_a_low_score_email); ?>">
                    </td>
                </tr>
                <tr id="form-email-row" valign="top">
                    <th scope="row">Set forms send to mail address for medium score submissions</th>
                    <td><input type="email" id="poh_quiz_form_a_medium_score_email" name="poh_quiz_form_a_medium_score_email"
                        value="<?php echo esc_attr($poh_quiz_form_a_medium_score_email); ?>">
                    </td>
                </tr>
                <tr id="form-email-row" valign="top">
                    <th scope="row">Set forms send to mail address for high score submissions</th>
                    <td><input type="email" id="poh_quiz_form_a_high_score_email" name="poh_quiz_form_a_high_score_email"
                        value="<?php echo esc_attr($poh_quiz_form_a_high_score_email); ?>">
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php

}