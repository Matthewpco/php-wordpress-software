<?php

function poh_doctor_switcher_content_page() {
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $poh_doctor_switcher_image_urls = isset($_POST['poh_doctor_switcher_image_urls']) ? $_POST['poh_doctor_switcher_image_urls'] : '';
        update_option('poh_doctor_switcher_image_urls', $poh_doctor_switcher_image_urls);

        $poh_doctor_switcher_dr_names = wp_unslash(isset($_POST['poh_doctor_switcher_dr_names']) ? $_POST['poh_doctor_switcher_dr_names'] : '');
        update_option('poh_doctor_switcher_dr_names', $poh_doctor_switcher_dr_names);

        $poh_doctor_switcher_dr_descriptions = wp_unslash(isset($_POST['poh_doctor_switcher_dr_descriptions']) ? $_POST['poh_doctor_switcher_dr_descriptions'] : '');
        update_option('poh_doctor_switcher_dr_descriptions', $poh_doctor_switcher_dr_descriptions);

        $poh_doctor_switcher_dr_button_names = wp_unslash(isset($_POST['poh_doctor_switcher_dr_button_names']) ? $_POST['poh_doctor_switcher_dr_button_names'] : '');
        update_option('poh_doctor_switcher_dr_button_names', $poh_doctor_switcher_dr_button_names);

        $poh_doctor_switcher_learn_more_urls = isset($_POST['poh_doctor_switcher_learn_more_urls']) ? $_POST['poh_doctor_switcher_learn_more_urls'] : '';
        update_option('poh_doctor_switcher_learn_more_urls', $poh_doctor_switcher_learn_more_urls);

        $poh_doctor_switcher_divider_image_url = isset($_POST['poh_doctor_switcher_divider_image_url']) ? $_POST['poh_doctor_switcher_divider_image_url'] : '';
        update_option('poh_doctor_switcher_divider_image_url', $poh_doctor_switcher_divider_image_url);
        
        $poh_doctor_switcher_sidebar_image_url = isset($_POST['poh_doctor_switcher_sidebar_image_url']) ? $_POST['poh_doctor_switcher_sidebar_image_url'] : '';
        update_option('poh_doctor_switcher_sidebar_image_url', $poh_doctor_switcher_sidebar_image_url);
    }

    $poh_doctor_switcher_image_urls = get_option('poh_doctor_switcher_image_urls');
    $poh_doctor_switcher_dr_names = get_option('poh_doctor_switcher_dr_names');
    $poh_doctor_switcher_dr_descriptions = get_option('poh_doctor_switcher_dr_descriptions');
    $poh_doctor_switcher_dr_button_names = get_option('poh_doctor_switcher_dr_button_names');
    $poh_doctor_switcher_learn_more_urls = get_option('poh_doctor_switcher_learn_more_urls');
    $poh_doctor_switcher_divider_image_url = get_option('poh_doctor_switcher_divider_image_url');
    $poh_doctor_switcher_sidebar_image_url = get_option('poh_doctor_switcher_sidebar_image_url');
    $selected_template = get_option('poh_selected_template');

    ?>
    <div class="wrap">
        <h1>POH Doctor Switcher Content</h1>
        <h2>Enter the following lists of items where each item that will appear in the HTML is separated by a semicolon. For example item1;item2;item3. The last item in a list does not have a semicolon following it.</h2>
        <form id="paradigm-content-form" method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Doctor image urls</th>
                    <td><textarea name="poh_doctor_switcher_image_urls" rows="5" cols="80" spellcheck="false"><?php echo esc_attr($poh_doctor_switcher_image_urls) ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Doctor names for slider content</th>
                    <td><textarea name="poh_doctor_switcher_dr_names" rows="5" cols="80" spellcheck="false"><?php echo esc_attr($poh_doctor_switcher_dr_names) ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Doctor descriptions</th>
                    <td><textarea name="poh_doctor_switcher_dr_descriptions" rows="10" cols="80" spellcheck="false"><?php echo esc_attr($poh_doctor_switcher_dr_descriptions) ?></textarea></td>
                </tr>
                <?php if($selected_template == "omsa" || $selected_template == "vasa") { ?>
                    <tr valign="top">
                        <th scope="row">Doctor names for buttons</th>
                        <td><textarea name="poh_doctor_switcher_dr_button_names" rows="5" cols="80" spellcheck="false"><?php echo esc_attr($poh_doctor_switcher_dr_button_names) ?></textarea></td>
                    </tr>
                <?php } ?>
                <tr valign="top">
                    <th scope="row">URLs for the "learn more" link or for the "meet Dr." button. If there is only one URL you should repeat that URL as many times as there are slides</th>
                    <td><textarea name="poh_doctor_switcher_learn_more_urls" rows="5" cols="80" spellcheck="false"><?php echo esc_attr($poh_doctor_switcher_learn_more_urls) ?></textarea></td>
                </tr>
                <?php if($selected_template == "vasa") { ?>
                    
                    <tr valign="top">
                        <th scope="row">URL for divider image. Enter one entry only.</th>
                        <td><textarea name="poh_doctor_switcher_divider_image_url" rows="5" cols="80" spellcheck="false"><?php echo esc_attr($poh_doctor_switcher_divider_image_url) ?></textarea></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">URL for sidebar image. Enter one entry only.</th>
                        <td><textarea name="poh_doctor_switcher_sidebar_image_url" rows="5" cols="80" spellcheck="false"><?php echo esc_attr($poh_doctor_switcher_sidebar_image_url) ?></textarea></td>
                    </tr>
                    
                <?php } ?>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php

}