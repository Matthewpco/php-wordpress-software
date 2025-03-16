<?php

function wpst_css_admin_page() {
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    


    // Check if the form was submitted on Post
    if (isset($_POST['submit'])) {

        $wpst_css = isset($_POST['wpst_css']) ? $_POST['wpst_css'] : '';
        update_option('wpst_css', $wpst_css);

    }

    // Get Request
    $wpst_css = get_option('wpst_css');

    ?>
    <div class="wrap">
        <h1>WPST Inline Styles</h1>
        <style>
            #wpst_css_wrapper {
                min-height: 70vh; /* Adjust the height as needed */
            }
        </style>
        <form method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">CSS</th>
                    <td><textarea name="wpst_css" id="wpst_css" rows="20" cols="50" class="large-text"><?php echo wp_unslash($wpst_css); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php
 
}