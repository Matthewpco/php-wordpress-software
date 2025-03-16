<?php

function poh_forms_css_admin_page() {
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    


    // Check if the form was submitted on Post
    if (isset($_POST['submit'])) {

        $poh_forms_css = isset($_POST['poh_forms_css']) ? $_POST['poh_forms_css'] : '';
        update_option('poh_forms_css', $poh_forms_css);

    }

    // Get Request
    $poh_forms_css = get_option('poh_forms_css');

    ?>
    <div class="wrap">
        <h1>Paradigm Forms Settings</h1>
        <style>
            #poh_forms_css_wrapper {
                min-height: 70vh; /* Adjust the height as needed */
            }
        </style>
        <form method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Forms CSS</th>
                    <td><textarea name="poh_forms_css" id="poh_forms_css" rows="20" cols="50" class="large-text"><?php echo wp_unslash($poh_forms_css); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php
 
}